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
                            rect: ['0%', '0%', '100%', '100%', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"fond.jpg",'0px','0px']
                        },
                        {
                            id: 'blus',
                            type: 'image',
                            rect: ['0%', '-21.4%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"blus.png",'0px','0px']
                        },
                        {
                            id: 'cal',
                            type: 'image',
                            rect: ['0%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"cal.png",'0px','0px']
                        },
                        {
                            id: 'box',
                            type: 'image',
                            rect: ['0%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"box.png",'0px','0px']
                        },
                        {
                            id: 'cant',
                            type: 'image',
                            rect: ['0%', '-52.1%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"cant.png",'0px','0px']
                        },
                        {
                            id: 'des',
                            type: 'image',
                            rect: ['-75.5%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"des.png",'0px','0px']
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
                    duration: 8568,
                    autoPlay: true,
                    data: [
                        [
                            "eid32",
                            "top",
                            1969,
                            398,
                            "linear",
                            "${blus}",
                            '-21.44%',
                            '0.09%'
                        ],
                        [
                            "eid29",
                            "opacity",
                            12,
                            858,
                            "linear",
                            "${box}",
                            '0',
                            '1'
                        ],
                        [
                            "eid54",
                            "opacity",
                            6000,
                            2568,
                            "linear",
                            "${box}",
                            '1',
                            '0'
                        ],
                        [
                            "eid58",
                            "opacity",
                            6000,
                            2568,
                            "linear",
                            "${cant}",
                            '1',
                            '0'
                        ],
                        [
                            "eid31",
                            "left",
                            1500,
                            469,
                            "linear",
                            "${des}",
                            '-75.47%',
                            '0%'
                        ],
                        [
                            "eid34",
                            "opacity",
                            12,
                            1957,
                            "linear",
                            "${blus}",
                            '0',
                            '1'
                        ],
                        [
                            "eid57",
                            "opacity",
                            6000,
                            2568,
                            "linear",
                            "${blus}",
                            '1',
                            '0'
                        ],
                        [
                            "eid36",
                            "opacity",
                            2367,
                            410,
                            "linear",
                            "${cal}",
                            '0.000000',
                            '0.97931034482759'
                        ],
                        [
                            "eid55",
                            "opacity",
                            6000,
                            2568,
                            "linear",
                            "${cal}",
                            '1',
                            '0'
                        ],
                        [
                            "eid30",
                            "top",
                            870,
                            630,
                            "linear",
                            "${cant}",
                            '-52.06%',
                            '0.09%'
                        ],
                        [
                            "eid56",
                            "opacity",
                            6000,
                            2568,
                            "linear",
                            "${des}",
                            '1',
                            '0'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("prom_edgeActions.js");
})("EDGE-615425708");
