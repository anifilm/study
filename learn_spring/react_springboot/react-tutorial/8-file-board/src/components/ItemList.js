import React from 'react';
import { Link } from 'react-router-dom';

// 부모 컴포넌트에서 컴포넌트 속성으로 수신
const ItemList = ({ items, isLoading }) => {
  return (
    <div className="container">
      <h3>상품 목록</h3>
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
                <th width="120">상품아이디</th>
                <th width="260">상품명</th>
                <th width="120">상품가격</th>
              </tr>
            </thead>
            <tbody>
              {!items.length && (
                <tr>
                  <td>100</td>
                  {/*<td colSpan="4">
                    등록된 게시물이 없습니다.
                  </td>*/}
                  <td><Link to={'/read/100'}>풍경사진</Link></td>
                  <td>1000원</td>
                </tr>
              )}
              {!!items.length && items.map((item) => (
                <tr key={item.itemNo}>
                  <td>{item.itemNo}</td>
                  <td>
                    <Link to={`/read/${item.itemNo}`}>{item.title}</Link>
                  </td>
                  <td>{item.writer}</td>
                </tr>
              ))}
            </tbody>
          </table>
          <br />
          <Link to="/create" className="waves-effect waves-light btn blue">새로운 상품 등록</Link>
        </>
      )}
    </div>
  );
};

export default ItemList;
