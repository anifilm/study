import React from 'react';
import { Link } from 'react-router-dom';

// 부모 컴포넌트에서 컴포넌트 속성으로 수신
const ItemList = ({ items, isLoading }) => {
  return (
    <div className="container">
      <h3>게시판 목록</h3>
      {isLoading && (
        <div className="progress">
          <div className="indeterminate"></div>
        </div>
      )}
      {!isLoading && items && (
        <>
          <table>
            <thead>
              <tr>
                <th width="80">번호</th>
                <th width="320">제목</th>
                <th width="100">글쓴이</th>
                <th width="180">작성일자</th>
              </tr>
            </thead>
            <tbody>
              {!items.length && (
                <tr>
                  <td></td>
                  <td colSpan="4">
                    등록된 게시물이 없습니다.
                  </td>
                </tr>
              )}
              {!!items.length && items.map((item) => (
                <tr key={item.itemNo}>
                  <td>{item.itemNo}</td>
                  <td>
                    <Link to={`/read/${item.itemNo}`}>{item.title}</Link>
                  </td>
                  <td>{item.writer}</td>
                  <td>{item.regDate}</td>
                </tr>
              ))}
            </tbody>
          </table>
          <br />
          <Link to="/create" className="waves-effect waves-light btn blue">새로운 글 작성</Link>
        </>
      )}
    </div>
  );
};

export default ItemList;
