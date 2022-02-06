const aws = require('aws-sdk');

exports.handler = async (event, context, callback) => {
  const cognitoProvider = new aws.CognitoIdentityServiceProvider({
    apiVersion: '2016-04-18',
  });

  let isAdmin = false;
  const adminEmails = ['anifilm02@gmail.com'];

  // 사용자가 관리자 중 한 명이라면 isAdmin 변수를 true로 설정
  if (adminEmails.indexOf(event.request.userAttributes.email) !== -1) {
    isAdmin = true;
  }

  const groupParams = {
    UserPoolId: event.userPoolId,
  };

  const userParams = {
    UserPoolId: event.userPoolId,
    Username: event.userName,
  };

  if (isAdmin) {
    groupParams.GroupName = 'Admin';
    userParams.GroupName = 'Admin';

    // 그룹이 있는지 확인하고, 없으면 그룹을 생성
    try {
      await cognitoProvider.getGroup(groupParams).promise();
    } catch (e) {
      await cognitoProvider.createGroup(groupParams).promise();
    }

    // 사용자가 관리자라면 Admin 그룹에 추가
    try {
      await cognitoProvider.adminAddUserToGroup(userParams).promise();
      callback(null, event);
    } catch (e) {
      callback(e);
    }
  } else {
    // 사용자가 어느 그룹에도 속하지 않으면 아무 작업도 하지 않음
    callback(null, event);
  }
};
