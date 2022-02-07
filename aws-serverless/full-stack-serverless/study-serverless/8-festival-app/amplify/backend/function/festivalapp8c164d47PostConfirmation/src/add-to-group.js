const aws = require('aws-sdk');

const cognitoidentityserviceprovider = new aws.CognitoIdentityServiceProvider({
  apiVersion: '2016-04-18',
});

exports.handler = async event => {
  const groupParams = {
    GroupName: process.env.GROUP,
    UserPoolId: event.userPoolId,
  };
  const addUserParams = {
    GroupName: process.env.GROUP,
    UserPoolId: event.userPoolId,
    Username: event.userName,
  };

  try {
    await cognitoidentityserviceprovider.getGroup(groupParams).promise();
  } catch (e) {
    await cognitoidentityserviceprovider.createGroup(groupParams).promise();
  }

  let isAdmin = false;
  const adminEmails = ['anifilm02@gmail.com'];
  if (adminEmails.indexOf(event.request.userAttributes.email) !== -1) {
    isAdmin = true;
  }
  // 사용자가 관리자인 경우 그룹에 추가
  if (isAdmin) {
    await cognitoidentityserviceprovider.adminAddUserToGroup(addUserParams).promise();
  }

  return event;
};
