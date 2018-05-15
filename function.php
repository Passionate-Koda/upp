<?php function insert($dbconn, $table, $parameters){
array_pop($parameters);
  // var_dump($parameters);
  $sql = sprintf('INSERT INTO %s (%s) VALUES(%s)',
      $table,
      implode(', ',array_keys($parameters)), ':'.implode(',:',array_keys($parameters))
  );
  // die(var_dump($sql));

$stmt =  $dbconn->prepare($sql);
$stmt->execute($parameters);
}
function update($dbconn, $table, $parameters,$column,$value){

function getVal($param){
  $result = [];
  foreach($param as $col => $val){
      $result[] = "$col = :$col";
    }
    $new = implode(', ', $result);
    return $new;
}

array_pop($parameters);
$what = getVal($parameters);

  // var_dump($parameters);
  $sql = sprintf('UPDATE %s SET %s WHERE %s=%s',
      $table, $what,$column,$value
  );
  // die(var_dump($sql));
$stmt =  $dbconn->prepare($sql);
$stmt->execute($parameters);

}



?>
