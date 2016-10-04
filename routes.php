<?php
/*
  This file is where we load all of our routes that we can navigate or post to
*/

/* GET ROUTES */
 Router::get('', 'PagesController@home');
 Router::get('survey', 'SurveyController@getSurvey');//an alias for survey/1 (will redirect to /1)
 Router::get('survey/1', 'SurveyController@getSurvey');
 Router::get('survey/2', 'SurveyController@getSurvey');
 Router::get('survey/3', 'SurveyController@getSurvey');

 /* POST ROUTES */

Router::post('survey', 'SurveyController@postAnswers');
