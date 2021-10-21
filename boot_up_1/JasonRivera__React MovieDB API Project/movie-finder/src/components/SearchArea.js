import React from 'react';

const SearchArea = (props) => {
  return (
    <div className="container">
      <div className="row">
        <section className="col s6 offset-s3">
          <form action="" onSubmit={props.handleSubmit}>
            <div className="input-field">
              <input type="text" placeholder="Search movie" onChange={props.handleChange} />
            </div>
          </form>
        </section>
      </div>
    </div>
  );
}

export default SearchArea;
