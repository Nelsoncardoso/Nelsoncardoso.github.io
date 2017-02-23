<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php

$team = [
  ["name" => "Nelson Cardoso", "avatar" => "teste", "selected" => 0],
  ["name" => "Walesson Silva", "avatar" => "teste2", "selected" => 0],
  ["name" => "Julio Alves", "avatar" => "teste1", "selected" => 0],
  ["name" => "Bruno Moura", "avatar" => "teste1", "selected" => 0],
];

function ShortSelectedCoffeMember($team){
  for($i = 0; $i < 100; $i++){
    $team[rand(0,count($team)-1)]['selected']++;
  }

  return $team;
}
function ShortBetterClassifiedMember($team){
  $classified_team = ShortSelectedCoffeMember($team);
  usort($classified_team, 'OrderTeam');
  return $classified_team;
}
function CalculateRatingPercentage($value){
  return ( $value / 100 ) * 100;
}
function ViewListSelectedCoffeeMake($team){
  $html = "";
  foreach ($team as $member) {
    $html .= '
    <h4>'.$member['name'].'</h4>
    <div class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="'.CalculateRatingPercentage($member['selected']).'" aria-valuemin="0" aria-valuemax="100" style="width: '.CalculateRatingPercentage($member['selected']).'%;">
        '.CalculateRatingPercentage($member['selected']).'%
      </div>
    </div>
    ';
  }
  return $html;
}
function OrderTeam($prev, $next) {
	return $prev['selected'] < $next['selected'];
}

echo ViewListSelectedCoffeeMake(ShortBetterClassifiedMember($team));
