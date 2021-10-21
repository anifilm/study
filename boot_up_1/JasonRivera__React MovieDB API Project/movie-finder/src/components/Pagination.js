import React from 'react';

const Pagination = (props) => {
  const pageLinks = [];
  for (let i = 1; i <= props.pages; i++) {
    let active = props.currentPage === i ? 'active' : '';
    pageLinks.push(
      <li
        className={`waves-effect ${active}`}
        key={i}
        onClick={() => {
          return props.nextPage(i);
        }}
      >
        {/*eslint-disable-next-line*/}
        <a href="#">{i}</a>
      </li>
    );
  }

  return (
    <div className="container">
      <div className="row">
        <ul className="pagination">
          {/*eslint-disable-next-line*/}
          {props.currentPage > 1 ? <li className={"waves-effect"} onClick={() => { return props.nextPage(props.currentPage-1); }}><a href="#">Prev</a></li> : ''}
          {pageLinks}
          {/*eslint-disable-next-line*/}
          {props.currentPage < props.pages ? <li className={"waves-effect"} onClick={() => { return props.nextPage(props.currentPage+1); }}><a href="#">Next</a></li> : ''}
        </ul>
      </div>
    </div>
  );
};

export default Pagination;
