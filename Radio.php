<?php
namespace Mano;

interface Radio {
    //Parameters
    const maxVol = 30;
    const minVol = 0;
    const minFm = 88;
    const maxFm = 108;
    const stationInArea = [
        'Rock FM' => '87,8',
        'Extra FM' => '88,5',
        'LRT Radijas' => '89,0',
        'Radiocentras' => '89,6',
        'Marijos radijas' => '93,1',
        'Start FM' => '94,2',
        'Vaikų radijas' => '94,9',
        'BBC World Service' => '95,5',
        'Power Hit Radio' => '95,9',
        'A2' => '96,4',
        'Žinių radijas' => '97,3',
        'LRT Opus' => '98,3',
        'Baltupių Radijas' => '98,8',
        'Jazz FM' => '99,3',
        'European Hit Radio' => '99,7',
        'ZIP FM' => '100,1',
        'Super FM' => '100,5',
        'Pūkas–2' => '100,9',
        'Easy FM' => '101,5',
        'Geras FM' => '101,9',
        'Gold FM' => '102,6',
        'Lietus' => '103,1',
        'Znad Wilii' => '103,8',
        'Relax FM' => '104,3',
        'XFM' => '104,7',
        'LRT Klasika' => '105,1',
        'Russkoje radio Baltija' => '105,6',
        'M-1 plius' => '106,2'
    ];

    // Indicators
    function showTune($data);
    function showRadioStationName($data);
    function showVolume($data);

    //Buttons
    function power();
    function volumeUp(); //+1
    function volumeDown(); //-1
    function goToNexStationUp();
    function goToNexStationDown();
    function tuneDown(); //-0.1
    function tuneUp(); //+0.1
    function savePresets1();
    function savePresets2();
    function savePresets3();
    function loadPresets1();
    function loadPresets2();
    function loadPresets3();
}
