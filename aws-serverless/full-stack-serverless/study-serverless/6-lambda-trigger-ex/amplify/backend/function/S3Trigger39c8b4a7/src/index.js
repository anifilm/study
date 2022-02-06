// sharp 라이브러리 가져오기
const sharp = require('sharp');
const aws = require('aws-sdk');
const s3 = new aws.S3();

exports.handler = async function (event, context) {
  // 이벤트 타입이 삭제인 경우 함수를 종료
  if (event.Records[0].eventName === 'ObjectRemoved:Delete') return;

  // 이벤트에서 버킷 이름과 키를 가져옴
  const BUCKET = event.Records[0].s3.bucket.name;
  const KEY = event.Records[0].s3.object.key;

  try {
    // S3에서 이미지 데이터를 가져옴
    let image = await s3.getObject({ Bucket: BUCKET, Key: KEY }).promise();
    image = await sharp(image.Body);

    // 너비와 높이를 포함한 이미지 메타데이터를 가져옴
    const metadata = await image.metadata();
    if (metadata.width > 1000) {
      // 너비가 1000보가 크면 이미지의 크기를 조정
      const resizedImage = await image.resize({ width: 1000 }).toBuffer();
      await s3.putObject({
        Bucket: BUCKET,
        Body: resizedImage,
        Key: KEY,
      }).promise();
      return;
    } else {
      return;
    }
  } catch (err) {
    context.fail(`Error getting files: ${err}`);
  }
};
