<?php
/*
  This file is where we load all of our routes that we can navigate or post to
*/

/* GET ROUTES */
 Router::get('', 'PagesController@home');
 Router::get('survey', 'SurveyController@getSurvey');//takes to appropriate page based on progress
 Router::get('survey/1', 'SurveyController@getSurvey');
 Router::get('survey/2', 'SurveyController@getSurvey');
 Router::get('survey/3', 'SurveyController@getSurvey');
 Router::get('survey/results', 'SurveyController@getResults');

 /* POST ROUTES */
Router::post('survey/1', 'SurveyController@postPageOne');
Router::post('survey/2', 'SurveyController@postPageTwo');
Router::post('survey/3', 'SurveyController@postPageThree');
Router::post('session/clear', 'SurveyController@clearSession');
Router::post('survey/allow', 'SurveyController@allowSurvey');
