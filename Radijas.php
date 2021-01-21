<?php

namespace Mano;
//radijoje neturi buti iskvieciami new DuomenuBaze

class Radijas extends RadijosDB implements Radio
{
    private $garsas = 10, $daznis = 88.00, $stotiesPav, $i = 0;

    public function __construct()
    {
        $this->garsas;
        $this->daznis;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function showTune($data)
    {
        return $this->daznis;
    }

    public function showRadioStationName($data)
    {

        return $this->stotiesPav;
    }

    public function showVolume($data)
    {
        return $this->garsas;
    }

    public function power()
    {
        echo 'Tune: ' . $this->showTune(88.00) .' FM<br>';
        echo 'Station: ' . $this->showRadioStationName(1) . '<br>';
        echo 'Volume: +' . $this->showVolume(10) . ' <br><br>';
        echo '<button type="submit" name="power" value="off">Power</button>';
    }

    public function __destruct()
    {
        $_SESSION['r'] = $this;
    }

    public function volumeUp()
    {
        $this->garsas = $this->garsas + 1;
        if ($this->garsas > self::maxVol) {
            $this->garsas = self::maxVol;
        }
    } //+1

    public function volumeDown()
    {
        $this->garsas = $this->garsas - 1;
        if ($this->garsas < self::minVol) {
            $this->garsas = self::minVol;
        }
    } //-1

    public function goToNexStationUp()
    {
        $keys = array_keys(self::stationInArea);
        if ($this->i == 0) {
            $this->stotiesPav = $keys[$this->i];
        }

        $this->i++;
        if ($this->i > count($keys) - 1) {
            $this->i = count($keys) - 1;
        }
        $this->stotiesPav = $keys[$this->i];
        foreach (self::stationInArea as $key => $value) {
            $val = str_replace(',', '.', $value);
            if ($this->stotiesPav == $key) {
                $this->daznis = $val;
            }
        }
    }

    public function goToNexStationDown()
    {
        --$this->i;
        $keys = array_keys(self::stationInArea);
        if ($this->i < 0) {
            $this->i = 0;
        }
        $this->stotiesPav = $keys[$this->i];
        foreach (self::stationInArea as $key => $value) {
            $val = str_replace(',', '.', $value);
            if ($this->stotiesPav == $key) {
                $this->daznis = $val;
            }
        }
    }

    public function tuneDown()
    {
        $this->daznis = $this->daznis - 0.1;
        if ($this->daznis < self::minFm) {
            $this->daznis = self::minFm;
        }
        foreach (self::stationInArea as $key => $value) {
            $val = str_replace(',', '.', $value);
            $this->daznis = (string) $this->daznis;
            if ($this->daznis == $val) {
                $this->stotiesPav = $key;
            } else {
                $this->stotiesPav = '';
            }
        }
    } //-0.1

    public function tuneUp()
    {
        $this->daznis = $this->daznis + 0.1;
        if ($this->daznis > self::maxFm) {
            $this->daznis = self::maxFm;
        }
        foreach (self::stationInArea as $key => $value) {
            $val = str_replace(',', '.', $value);
            $this->daznis = (string) $this->daznis;
            if ($this->daznis == $val) {
                $this->stotiesPav = $key;
            } else {
                $this->stotiesPav = '';
            }
        }
    } //+0.1

    public function savePresets1()
    {
        var_dump($this->getAll());

        // $DB = new RadijosDB; <---WRONG
        // var_dump($DB->getAll());
        // update
        // $sP1Daznis = $this->daznis;
        // $sP1Stotis = $this->stotiesPav;
    }

    public function savePresets2()
    {
    }

    public function savePresets3()
    {
    }

    public function loadPresets1()
    {
        // getAll
        // $this->daznis = $sP1Daznis;
        // $this->stotiesPav = $sP1Stotis;
    }

    public function loadPresets2()
    {
    }

    public function loadPresets3()
    {
    }
}
