import React from 'react';

const MyName = ({ name }) => {
  return (
    <div>
      안녕하세요! 제 이름은 <b>{name}</b>입니다.
    </div>
  );
}

MyName.defaultProps = {
  name: '기본이름'
};

export default MyName;
