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
    
    echo "<html><body>\n";
    echo '<table border=0 style="border-spacing: 0px;">';
    $counterColor = '#ccffcc';
    foreach($logFile as $singleLog) {
      if (preg_match($dateInLogPattern, $singleLog)) {

        // Bold date and error signature
        $separatedString = explode(" ", $singleLog, 4);
        $logRestOfString = $separatedString[3];
        $dateString = $separatedString[0] . " " . $separatedString[1] . " " . $separatedString[2];

        if ($counter % 2 == 0) {
          ;
          echo '<tr><td style="border: 0px; background-color: #f5f5f0; padding: 15px;"><b>' . $dateString . '</b> ' . $logRestOfString . "</td></tr>\n";
        }
        else {
          echo '<tr><td style="border: 0px; background-color: #e1e1d0; padding: 15px;"><b>' . $dateString . '</b> ' . $logRestOfString . "</td></tr>\n";
        }
      }
      else {
        echo '<tr><td style="background-color: #ccccff; padding: 5px 5px 5px 50px;">' . $singleLog . "</td></tr>\n";
      }
      ++$counter;
    }
    echo "</table>\n";
    echo "</body></html>";
  }
}

$log = new logParse;
$logFile = $log->openLogFile();
$log->parseLogFile($logFile);

?>