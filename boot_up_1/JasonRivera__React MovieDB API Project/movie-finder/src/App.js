import React, { Component } from 'react';

import Nav from './components/Nav';
import SearchArea from './components/SearchArea';
import MovieList from './components/MovieList';
import Pagination from './components/Pagination';

class App extends Component {
  constructor() {
    super();
    this.state = {
      movies: [],
      searchTerm: '',
      totalPages: 0,
      currentPage: 1,
    };
    this.apiKey = process.env.REACT_APP_API_KEY;
  }

  handleSubmit = (e) => {
    e.preventDefault();
    fetch(
      `https://api.themoviedb.org/3/search/movie?api_key=${this.apiKey}&query=${this.state.searchTerm}`,
    )
      .then((data) => {
        return data.json();
      })
      .then((data) => {
        console.log(data);
        this.setState({
          movies: [...data.results],
          totalPages: data.total_pages,
          currentPage: 1,
        });
      });
  };
  handleChange = (e) => {
    this.setState({
      searchTerm: e.target.value,
    });
  };
  nextPage = (pageNumber) => {
    fetch(
      `https://api.themoviedb.org/3/search/movie?api_key=${this.apiKey}&query=${this.state.searchTerm}&page=${pageNumber}`,
    )
      .then((data) => {
        return data.json();
      })
      .then((data) => {
        console.log(data);
        this.setState({
          movies: [...data.results],
          currentPage: pageNumber,
        });
      });
  };

  render() {
    return (
      <div className="App">
        <Nav />
        <SearchArea
          handleSubmit={this.handleSubmit}
          handleChange={this.handleChange}
        />
        <MovieList movies={this.state.movies} />
        {this.state.totalPages > 1 ? (
          <Pagination
            pages={this.state.totalPages}
            nextPage={this.nextPage}
            currentPage={this.state.currentPage}
          />
        ) : (
          ''
        )}
      </div>
    );
  }
}

export default App;
