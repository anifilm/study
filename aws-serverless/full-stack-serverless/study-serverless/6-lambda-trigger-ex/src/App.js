import React, { useEffect, useState } from 'react';
import { Storage } from 'aws-amplify';
import { v4 as uuid } from 'uuid';
import './App.css';

function App() {
  const [images, setImages] = useState([]);

  useEffect(() => {
    fetchImages();
  }, []);

  async function onChange(e) {
    // 파일이 업로드되면 고유한 이름을 생성하고 Storage API를 사용하여 저장
    const file = e.target.files[0];
    const filetype = file.name.split('.')[file.name.split.length - 1];
    await Storage.put(`${uuid()}.${filetype}`, file);
    // 파일이 업로드되면 이미지 리스트를 가져옴
    fetchImages();
  }

  async function fetchImages() {
    // S3 버킷에서 이미지 키 리스트를 가져옴
    const files = await Storage.list('');
    // 키가 있으면 이미지가 보여지도록 인증(signed)되어야 한다.
    const signedFiles = await Promise.all(files.map(async (file) => {
      // 이미지가 인증되려면 이미지 키 배열을 통해 각 이미지에 대한 인증된 URL(signed URL)을 가져와야 한다.
      const signedFile = await Storage.get(file.key);
      return signedFile;
    }));
    setImages(signedFiles);
  }

  return (
    <div className="App">
      <header className="App-header">
        <input type="file" onChange={onChange} />
        {images.map((image) => (
          <img src={image} key={image} alt={image} style={{ width: 500, marginTop: '10px' }} />
        ))}
      </header>
    </div>
  );
}

export default App;
