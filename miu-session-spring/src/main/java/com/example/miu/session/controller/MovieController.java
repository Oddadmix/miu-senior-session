package com.example.miu.session.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.example.miu.session.entity.Movie;
import com.example.miu.session.repository.MovieRepository;

@RestController
public class MovieController {
	@Autowired
	MovieRepository movieRepo;

	@RequestMapping(value = "/api/movies", method = RequestMethod.GET)
	public List<Movie> getAllMovies() {
		return (List<Movie>) movieRepo.findAll();
	}

	@RequestMapping(value = "/api/movies", method = RequestMethod.POST)
	public Movie createMovie(@RequestBody Movie movie) {
		return movieRepo.save(movie);
	}

	@RequestMapping(value = "/api/movies/{id}", method = RequestMethod.GET)
	public Movie getMovieById(@PathVariable("id") long id) {
		return movieRepo.findOne(id);
	}

	@RequestMapping(value = "/api/movies/{id}", method = RequestMethod.PUT)
	public Movie updateMovie(@RequestBody Movie movie, @PathVariable("id") long id) {
		return movieRepo.save(movie);
	}

}
