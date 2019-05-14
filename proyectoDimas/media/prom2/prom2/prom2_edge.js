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
                            id: 'fond',
                            type: 'image',
                            rect: ['0%', '0%', '100%', '100.1%', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"fond.jpg",'0px','0px']
                        },
                        {
                            id: 'cir',
                            type: 'image',
                            rect: ['0%', '0%', '0%', '0%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"cir.png",'0px','0px']
                        },
                        {
                            id: 'dosxuno',
                            type: 'image',
                            rect: ['0.1%', '0%', '99.9%', '100%', 'auto', 'auto'],
                            opacity: '0.0068965517241379',
                            fill: ["rgba(0,0,0,0)",im+"dosxuno.png",'0px','0px']
                        },
                        {
                            id: 'encami',
                            type: 'image',
                            rect: ['0%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '0.0068965517241379',
                            fill: ["rgba(0,0,0,0)",im+"encami.png",'0px','0px']
                        },
                        {
                            id: 'mes',
                            type: 'image',
                            rect: ['71.1%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"mes.png",'0px','0px']
                        },
                        {
                            id: 'holl',
                            type: 'image',
                            rect: ['0%', '30.6%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"holl.png",'0px','0px']
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: [undefined, undefined, '100%', '100%'],
                            overflow: 'hidden',
                            fill: ["rgba(255,255,255,1)"]
                        }
                    }
                },
                timeline: {
                    duration: 7500,
                    autoPlay: true,
                    data: [
                        [
                            "eid28",
                            "opacity",
                            6713,
                            787,
                            "linear",
                            "${cir}",
                            '1',
                            '0'
                        ],
                        [
                            "eid2",
                            "height",
                            0,
                            500,
                            "linear",
                            "${cir}",
                            '0%',
                            '100%'
                        ],
                        [
                            "eid1",
                            "width",
                            0,
                            500,
                            "linear",
                            "${cir}",
                            '0%',
                            '100%'
                        ],
                        [
                            "eid5",
                            "opacity",
                            1040,
                            415,
                            "linear",
                            "${encami}",
                            '0',
                            '1'
                        ],
                        [
                            "eid25",
                            "opacity",
                            6713,
                            787,
                            "linear",
                            "${encami}",
                            '1',
                            '0'
                        ],
                        [
                            "eid26",
                            "opacity",
                            6713,
                            787,
                            "linear",
                            "${holl}",
                            '1',
                            '0'
                        ],
                        [
                            "eid3",
                            "opacity",
                            500,
                            540,
                            "linear",
                            "${dosxuno}",
                            '0',
                            '0.99310344827586'
                        ],
                        [
                            "eid27",
                            "opacity",
                            6713,
                            787,
                            "linear",
                            "${dosxuno}",
                            '0.993103',
                            '0'
                        ],
                        [
                            "eid24",
                            "opacity",
                            6713,
                            787,
                            "linear",
                            "${mes}",
                            '1',
                            '0'
                        ],
                        [
                            "eid8",
                            "top",
                            2250,
                            505,
                            "linear",
                            "${holl}",
                            '30.64%',
                            '-6.59%'
                        ],
                        [
                            "eid9",
                            "top",
                            2755,
                            345,
                            "linear",
                            "${holl}",
                            '-6.59%',
                            '0.13%'
                        ],
                        [
                            "eid6",
                            "left",
                            1455,
                            445,
                            "linear",
                            "${mes}",
                            '71.06%',
                            '-12.15%'
                        ],
                        [
                            "eid7",
                            "left",
                            1900,
                            350,
                            "linear",
                            "${mes}",
                            '-12.15%',
                            '0.02%'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("prom2_edgeActions.js");
})("EDGE-628068800");
