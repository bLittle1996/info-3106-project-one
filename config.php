<?php
/* various settings that are stored in one central location so we can easily make changes to various settings.
For example, say we want to change a database - instead of hunting down each and every instance where we
specified our DB_NAME, we can just change it here, and know everything is just fabulous
*/

return [
  'app' => [
  ],
  'database' => [ //these fields are not required, but are placed here in the event we integrate database functionality
    "DB_HOST" => "",
    "DB_NAME" => "",
    "DB_USERNAME" => "",
    "DB_PASSWORD" => 'hunter2'
  ]
];
