<?php
/*
  This file is where we load all of our routes that we can navigate or post to
*/


/* GET ROUTES */
 Router::get((Request::root() ? Request::root() : '') . "", 'PagesController@home');
 Router::get((Request::root() ? Request::root() . '/' : '') . "survey", 'SurveyController@getSurvey');//takes to appropriate page based on progress
 Router::get((Request::root() ? Request::root() . '/' : '') . "survey/1", 'SurveyController@getSurvey');
 Router::get((Request::root() ? Request::root() . '/' : '') . "survey/2", 'SurveyController@getSurvey');
 Router::get((Request::root() ? Request::root() . '/' : '') . "survey/3", 'SurveyController@getSurvey');
 Router::get((Request::root() ? Request::root() . '/' : '') . "survey/results", 'SurveyController@getResults');

 /* POST ROUTES */
Router::post((Request::root() ? Request::root() . '/' : '') . 'survey/1', 'SurveyController@postPageOne');
Router::post((Request::root() ? Request::root() . '/' : '') . 'survey/2', 'SurveyController@postPageTwo');
Router::post((Request::root() ? Request::root() . '/' : '') . 'survey/3', 'SurveyController@postPageThree');
Router::post((Request::root() ? Request::root() . '/' : '') . 'session/clear', 'SurveyController@clearSession');
Router::post((Request::root() ? Request::root() . '/' : '') . 'survey/allow', 'SurveyController@allowSurvey');
