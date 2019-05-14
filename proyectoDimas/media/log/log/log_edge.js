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
                            id: 'a',
                            type: 'image',
                            rect: ['0%', '27.1%', '100%', '100%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"a.png",'0px','0px']
                        },
                        {
                            id: 'ab',
                            type: 'image',
                            rect: ['0%', '-29.2%', '100%', '100%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"ab.png",'0px','0px']
                        },
                        {
                            id: 'de',
                            type: 'image',
                            rect: ['-13.8%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"de.png",'0px','0px']
                        },
                        {
                            id: 'is',
                            type: 'image',
                            rect: ['11%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"is.png",'0px','0px']
                        },
                        {
                            id: 'bod',
                            type: 'image',
                            rect: ['0%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"bod.png",'0px','0px']
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
                    duration: 5298,
                    autoPlay: true,
                    data: [
                        [
                            "eid5",
                            "top",
                            1570,
                            680,
                            "linear",
                            "${ab}",
                            '-29.19%',
                            '-0.15%'
                        ],
                        [
                            "eid11",
                            "left",
                            2640,
                            355,
                            "linear",
                            "${is}",
                            '10.95%',
                            '0.05%'
                        ],
                        [
                            "eid8",
                            "left",
                            2250,
                            390,
                            "linear",
                            "${de}",
                            '-13.81%',
                            '0.14%'
                        ],
                        [
                            "eid2",
                            "top",
                            1000,
                            570,
                            "linear",
                            "${a}",
                            '27.14%',
                            '-0.14%'
                        ],
                        [
                            "eid1",
                            "opacity",
                            0,
                            1000,
                            "linear",
                            "${bod}",
                            '0',
                            '1'
                        ],
                        [
                            "eid17",
                            "opacity",
                            3970,
                            1328,
                            "linear",
                            "${bod}",
                            '1',
                            '0'
                        ],
                        [
                            "eid13",
                            "opacity",
                            2435,
                            205,
                            "linear",
                            "${is}",
                            '0',
                            '1'
                        ],
                        [
                            "eid18",
                            "opacity",
                            3970,
                            1328,
                            "linear",
                            "${is}",
                            '1',
                            '0'
                        ],
                        [
                            "eid7",
                            "opacity",
                            1250,
                            285,
                            "linear",
                            "${ab}",
                            '0',
                            '0.97931034482759'
                        ],
                        [
                            "eid14",
                            "opacity",
                            3970,
                            1328,
                            "linear",
                            "${ab}",
                            '0.9793099761009216',
                            '0'
                        ],
                        [
                            "eid10",
                            "opacity",
                            2000,
                            215,
                            "linear",
                            "${de}",
                            '0',
                            '1'
                        ],
                        [
                            "eid16",
                            "opacity",
                            3970,
                            1328,
                            "linear",
                            "${de}",
                            '1',
                            '0'
                        ],
                        [
                            "eid4",
                            "opacity",
                            750,
                            250,
                            "linear",
                            "${a}",
                            '0',
                            '1'
                        ],
                        [
                            "eid15",
                            "opacity",
                            3970,
                            1328,
                            "linear",
                            "${a}",
                            '1',
                            '0'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("log_edgeActions.js");
})("EDGE-664768533");
