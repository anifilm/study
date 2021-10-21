import React from 'react';

const Movie = (props) => {
  return (
    <div className="col s12 m6 l3">
      <div className="card">
        <a href="/">
          <div className="card-image waves-effect waves-block waves-light">
            {props.image === null ? (
              <img
                src={`https://s3-ap-southeast-1.amazonaws.com/upcode/static/default-image.jpg`}
                alt="noImage"
                style={{ width: '100%' }}
              />
            ) : (
              <img
                src={`http://image.tmdb.org/t/p/w185${props.image}`}
                alt="posterImage"
                style={{ width: '100%' }}
              />
            )}
          </div>
          <div className="card-content">
            <p style={{ height: '50px', color: 'black' }}>
              {props.title}
            </p>
          </div>
        </a>
      </div>
    </div>
  );
};

export default Movie;
