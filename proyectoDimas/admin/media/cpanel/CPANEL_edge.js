/*jslint */
/*global AdobeEdge: false, window: false, document: false, console:false, alert: false */
(function (compId) {

    "use strict";
    var im='images/',
        aud='media/',
        vid='media/',
        js='js/',
        fonts = {
        },
        opts = {
            'gAudioPreloadPreference': 'auto',
            'gVideoPreloadPreference': 'auto'
        },
        resources = [
        ],
        scripts = [
        ],
        symbols = {
            "stage": {
                version: "6.0.0",
                minimumCompatibleVersion: "5.0.0",
                build: "6.0.0.400",
                scaleToFit: "none",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            id: 'boutique_dimas',
                            type: 'image',
                            rect: ['0%', '71.3%', '100%', '100%', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"boutique%20dimas.png",'0%','0%']
                        },
                        {
                            id: 'dimaslog',
                            type: 'image',
                            rect: ['40.6%', '0%', '18.8%', '57%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"dimaslog.png",'0%','0%']
                        },
                        {
                            id: 'dimaslog2',
                            type: 'image',
                            rect: ['40.6%', '0%', '18.8%', '57%', 'auto', 'auto'],
                            opacity: '0.98561151079137',
                            fill: ["rgba(0,0,0,0)",im+"dimaslog2.png",'0%','0%']
                        },
                        {
                            id: 'c-panel',
                            type: 'image',
                            rect: ['0%', '-92%', '100%', '100%', 'auto', 'auto'],
                            borderRadius: ["0% 0%", "0% 0%", "0% 0%", "0% 0%"],
                            fill: ["rgba(0,0,0,0)",im+"c-panel.png",'0%','0%','100%','100%', 'no-repeat']
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: ['null', 'null', '100%', '100%', 'auto', 'auto'],
                            overflow: 'hidden',
                            fill: ["rgba(255,255,255,0.63)"]
                        }
                    }
                },
                timeline: {
                    duration: 4015,
                    autoPlay: true,
                    data: [
                        [
                            "eid11",
                            "opacity",
                            1495,
                            515,
                            "linear",
                            "${dimaslog2}",
                            '0.000000',
                            '0.98561151079137'
                        ],
                        [
                            "eid35",
                            "rotateZ",
                            2740,
                            275,
                            "linear",
                            "${c-panel}",
                            '0deg',
                            '-10deg'
                        ],
                        [
                            "eid37",
                            "rotateZ",
                            3015,
                            225,
                            "linear",
                            "${c-panel}",
                            '-10deg',
                            '0deg'
                        ],
                        [
                            "eid38",
                            "rotateZ",
                            3240,
                            264,
                            "linear",
                            "${c-panel}",
                            '0deg',
                            '10deg'
                        ],
                        [
                            "eid39",
                            "rotateZ",
                            3504,
                            240,
                            "linear",
                            "${c-panel}",
                            '10deg',
                            '0deg'
                        ],
                        [
                            "eid20",
                            "left",
                            2010,
                            730,
                            "linear",
                            "${dimaslog2}",
                            '40.63%',
                            '0%'
                        ],
                        [
                            "eid4",
                            "top",
                            515,
                            985,
                            "linear",
                            "${c-panel}",
                            '-92%',
                            '0%'
                        ],
                        [
                            "eid2",
                            "top",
                            0,
                            870,
                            "linear",
                            "${boutique_dimas}",
                            '71.33%',
                            '0%'
                        ],
                        [
                            "eid25",
                            "left",
                            2010,
                            725,
                            "linear",
                            "${dimaslog}",
                            '40.63%',
                            '81.25%'
                        ],
                        [
                            "eid7",
                            "opacity",
                            1500,
                            515,
                            "linear",
                            "${dimaslog}",
                            '0.000000',
                            '0.97841726618705'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("CPANEL_edgeActions.js");
})("EDGE-5120520");
