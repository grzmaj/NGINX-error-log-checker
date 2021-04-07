<?php



class logParse {
  public $logPath = "/home/alinks/logs/error.log";

  public function openLogFile() {
    $logFile = file_get_contents($this->logPath, 'r');
    $logFile = explode("\n", $logFile);
    return $logFile;
  }

  public function parseLogFile($logFile) {
    $dateInLogPattern = '/\d{4}\/\d{2}\/\d{2}/';
    echo "<html><body>";
    echo '<table>';
    foreach($logFile as $singleLog) {
      if (preg_match($dateInLogPattern, $singleLog)) {
        echo '<tr><td style="padding: 15px;">' . $singleLog . "</td></tr>";
      }
      else {
        echo '<tr><td style="padding: 5px 5px 5px 50px;">' . $singleLog . "</td></tr>";
      }
    }
    echo "</table>";
    echo "</body></html>";
  }
}

$log = new logParse;
$logFile = $log->openLogFile();
$log->parseLogFile($logFile);

?>