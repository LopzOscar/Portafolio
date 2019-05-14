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
                            id: '_2',
                            type: 'image',
                            rect: ['0%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"2.jpg",'0px','0px']
                        },
                        {
                            id: 'dimaslog',
                            type: 'image',
                            rect: ['9.1%', '10.2%', '83.9%', '73.3%', 'auto', 'auto'],
                            opacity: '0.020689655172414',
                            fill: ["rgba(0,0,0,0)",im+"dimaslog.png",'0px','0px']
                        },
                        {
                            id: '_10',
                            type: 'image',
                            rect: ['0%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"10.jpg",'0px','0px']
                        },
                        {
                            id: '_18',
                            type: 'image',
                            rect: ['0%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"18.jpg",'0px','0px']
                        },
                        {
                            id: '_29',
                            type: 'image',
                            rect: ['0%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"29.jpg",'0px','0px']
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: ['null', 'null', '100%', '100%', 'auto', 'auto'],
                            overflow: 'hidden',
                            fill: ["rgba(255,255,255,1)"]
                        }
                    }
                },
                timeline: {
                    duration: 21000,
                    autoPlay: true,
                    data: [
                        [
                            "eid69",
                            "opacity",
                            1000,
                            1022,
                            "linear",
                            "${_29}",
                            '1',
                            '0'
                        ],
                        [
                            "eid74",
                            "opacity",
                            7000,
                            622,
                            "linear",
                            "${dimaslog}",
                            '0.02068965509533882',
                            '1'
                        ],
                        [
                            "eid72",
                            "opacity",
                            4889,
                            676,
                            "linear",
                            "${_10}",
                            '1',
                            '0'
                        ],
                        [
                            "eid73",
                            "opacity",
                            6324,
                            676,
                            "linear",
                            "${_2}",
                            '1',
                            '0'
                        ],
                        [
                            "eid70",
                            "opacity",
                            3282,
                            795,
                            "linear",
                            "${_18}",
                            '1',
                            '0'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("gal1_edgeActions.js");
})("EDGE-99883671");
