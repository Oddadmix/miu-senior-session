package com.example.miu.session.repository;

import org.springframework.data.repository.CrudRepository;

import com.example.miu.session.entity.Movie;

public interface MovieRepository extends CrudRepository<Movie, Long> {

}
