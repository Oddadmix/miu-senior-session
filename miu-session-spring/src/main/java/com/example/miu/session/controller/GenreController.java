package com.example.miu.session.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.example.miu.session.entity.Genre;
import com.example.miu.session.repository.GenreRepository;

@RestController
public class GenreController {
	@Autowired
	GenreRepository genreRepo;

	@RequestMapping(value = "/api/genres", method = RequestMethod.GET)
	public List<Genre> getAllGenres() {
		return (List<Genre>) genreRepo.findAll();
	}

	@RequestMapping(value = "/api/genres", method = RequestMethod.POST)
	public Genre createGenre(@RequestBody Genre genre) {
		return genreRepo.save(genre);
	}

	@RequestMapping(value = "/api/genres/{id}", method = RequestMethod.GET)
	public Genre getGenreById(@PathVariable("id") long id) {
		return genreRepo.findOne(id);
	}

	@RequestMapping(value = "/api/genres/{id}", method = RequestMethod.PUT)
	public Genre updateGenre(@RequestBody Genre genre, @PathVariable("id") long id) {
		return genreRepo.save(genre);
	}

}
