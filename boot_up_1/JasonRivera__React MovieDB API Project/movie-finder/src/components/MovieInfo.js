import React from 'react';

const MovieInfo = (props) => {
  return (
    <div className="container">
      <div
        className="row"
        onClick={props.closeMovieInfo}
        style={{ cursor: 'pointer', padding: '30px' }}
      >
        <i className="fas fa-arrow-left"></i>
        <span style={{ marginLeft: '10px' }}>Go back</span>
      </div>
      <div className="row">
        <div className="col s12 m4">
          {props.currentMovie.poster_path === null ? (
            <img
              src={
                'https://s3-ap-southeast-1.amazonaws.com/upcode/static/default-image.jpg'
              }
              alt="noImage"
              style={{ width: '100%' }}
            />
          ) : (
            <img
              src={`http://image.tmdb.org/t/p/w185${props.currentMovie.poster_path}`}
              alt="posterImage"
              style={{ width: '100%' }}
            />
          )}
        </div>
        <div className="col s12 m8">
          <div className="info-container">
            <h3>{props.currentMovie.title}</h3>
            <p>{props.currentMovie.release_date}</p>
            <p>{props.currentMovie.overview}</p>
          </div>
        </div>
      </div>
    </div>
  );
};

export default MovieInfo;
