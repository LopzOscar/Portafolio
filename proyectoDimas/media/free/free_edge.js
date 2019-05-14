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
                            id: 'caja2',
                            type: 'image',
                            rect: ['9.7%', '48.1%', '9.1%', '12.3%', 'auto', 'auto'],
                            opacity: '0.97841726618705',
                            fill: ["rgba(0,0,0,0)",im+"caja2.png",'0px','0px']
                        },
                        {
                            id: 'carr',
                            type: 'image',
                            rect: ['-33.5%', '53.6%', '16.1%', '16.6%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"carr.png",'0px','0px']
                        },
                        {
                            id: 'cami2',
                            type: 'image',
                            rect: ['42.7%', '31.7%', '55.2%', '44.9%', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"cami2.png",'0px','0px']
                        },
                        {
                            id: 'Text2',
                            type: 'text',
                            rect: ['29.2%', '11.6%', '45.5%', '16.5%', 'auto', 'auto'],
                            opacity: '1',
                            text: "<p style=\"margin: 0px;\">​<span style=\"font-size: 57px;\">Envió por</span></p>",
                            align: "left",
                            font: ['Arial, Helvetica, sans-serif', [150, "%"], "rgba(0,0,0,1)", "400", "none", "normal", "break-word", "normal"],
                            textStyle: ["", "", "", "", "none"]
                        },
                        {
                            id: 'Text3',
                            type: 'text',
                            rect: ['29.3%', '11.4%', '45.5%', '16.5%', 'auto', 'auto'],
                            opacity: '0',
                            text: "<p style=\"margin: 0px;\">​Gratis<span style=\"font-size: 24px;\">​</span></p>",
                            align: "center",
                            font: ['Arial, Helvetica, sans-serif', [406.25, "%"], "rgba(0,0,0,1)", "400", "none", "normal", "break-word", "normal"],
                            textStyle: ["", "", "", "", "none"]
                        },
                        {
                            id: 'e1e2a22a88c872874c7f8a2b8bd2cf2a2',
                            type: 'image',
                            rect: ['18.6%', '34%', '66.9%', '45%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"e1e2a22a88c872874c7f8a2b8bd2cf2a2.png",'0px','0px'],
                            transform: [[],[],[],['1','0.51']]
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
                    duration: 4523,
                    autoPlay: true,
                    data: [
                        [
                            "eid4",
                            "left",
                            0,
                            510,
                            "linear",
                            "${carr}",
                            '-33.45%',
                            '5.62%'
                        ],
                        [
                            "eid5",
                            "left",
                            510,
                            90,
                            "linear",
                            "${carr}",
                            '5.62%',
                            '5.28%'
                        ],
                        [
                            "eid13",
                            "left",
                            600,
                            395,
                            "linear",
                            "${carr}",
                            '5.27%',
                            '5.02%'
                        ],
                        [
                            "eid21",
                            "left",
                            1273,
                            380,
                            "linear",
                            "${carr}",
                            '5.09%',
                            '45.28%'
                        ],
                        [
                            "eid12",
                            "top",
                            995,
                            0,
                            "linear",
                            "${carr}",
                            '53.63%',
                            '53.63%'
                        ],
                        [
                            "eid10",
                            "height",
                            995,
                            0,
                            "linear",
                            "${caja2}",
                            '12.32%',
                            '12.32%'
                        ],
                        [
                            "eid33",
                            "opacity",
                            1636,
                            30,
                            "linear",
                            "${carr}",
                            '1',
                            '0.014388489208633'
                        ],
                        [
                            "eid61",
                            "scaleX",
                            2389,
                            484,
                            "linear",
                            "${e1e2a22a88c872874c7f8a2b8bd2cf2a2}",
                            '1',
                            '0.51'
                        ],
                        [
                            "eid63",
                            "scaleX",
                            2873,
                            517,
                            "linear",
                            "${e1e2a22a88c872874c7f8a2b8bd2cf2a2}",
                            '0.51',
                            '1.01'
                        ],
                        [
                            "eid65",
                            "scaleX",
                            3390,
                            511,
                            "linear",
                            "${e1e2a22a88c872874c7f8a2b8bd2cf2a2}",
                            '1.01',
                            '0.5'
                        ],
                        [
                            "eid67",
                            "scaleX",
                            3901,
                            511,
                            "linear",
                            "${e1e2a22a88c872874c7f8a2b8bd2cf2a2}",
                            '0.5',
                            '1.01'
                        ],
                        [
                            "eid17",
                            "left",
                            995,
                            265,
                            "linear",
                            "${cami2}",
                            '102.73%',
                            '42.74%'
                        ],
                        [
                            "eid29",
                            "left",
                            1674,
                            329,
                            "linear",
                            "${cami2}",
                            '42.73%',
                            '103.1%'
                        ],
                        [
                            "eid7",
                            "opacity",
                            600,
                            395,
                            "linear",
                            "${caja2}",
                            '0.028777',
                            '0.97841726618705'
                        ],
                        [
                            "eid31",
                            "opacity",
                            1666,
                            21,
                            "linear",
                            "${caja2}",
                            '0.9784169793128967',
                            '0'
                        ],
                        [
                            "eid38",
                            "opacity",
                            1815,
                            502,
                            "linear",
                            "${Text2}",
                            '0.000000',
                            '1'
                        ],
                        [
                            "eid70",
                            "opacity",
                            2317,
                            667,
                            "linear",
                            "${Text2}",
                            '1',
                            '0'
                        ],
                        [
                            "eid8",
                            "height",
                            995,
                            0,
                            "linear",
                            "${carr}",
                            '16.62%',
                            '16.62%'
                        ],
                        [
                            "eid9",
                            "width",
                            995,
                            0,
                            "linear",
                            "${carr}",
                            '16.11%',
                            '16.11%'
                        ],
                        [
                            "eid57",
                            "opacity",
                            2003,
                            386,
                            "linear",
                            "${e1e2a22a88c872874c7f8a2b8bd2cf2a2}",
                            '0.079137',
                            '0.96402877697842'
                        ],
                        [
                            "eid11",
                            "width",
                            995,
                            0,
                            "linear",
                            "${caja2}",
                            '9.13%',
                            '9.13%'
                        ],
                        [
                            "eid78",
                            "left",
                            4523,
                            0,
                            "linear",
                            "${Text2}",
                            '29.24%',
                            '29.24%'
                        ],
                        [
                            "eid64",
                            "scaleY",
                            2873,
                            517,
                            "linear",
                            "${e1e2a22a88c872874c7f8a2b8bd2cf2a2}",
                            '0.51',
                            '1.01'
                        ],
                        [
                            "eid66",
                            "scaleY",
                            3390,
                            511,
                            "linear",
                            "${e1e2a22a88c872874c7f8a2b8bd2cf2a2}",
                            '1.01',
                            '0.5'
                        ],
                        [
                            "eid68",
                            "scaleY",
                            3901,
                            511,
                            "linear",
                            "${e1e2a22a88c872874c7f8a2b8bd2cf2a2}",
                            '0.5',
                            '1.01'
                        ],
                        [
                            "eid14",
                            "top",
                            995,
                            0,
                            "linear",
                            "${caja2}",
                            '48.13%',
                            '48.13%'
                        ],
                        [
                            "eid74",
                            "top",
                            4523,
                            0,
                            "linear",
                            "${Text3}",
                            '11.38%',
                            '11.38%'
                        ],
                        [
                            "eid77",
                            "top",
                            4523,
                            0,
                            "linear",
                            "${Text2}",
                            '11.55%',
                            '11.55%'
                        ],
                        [
                            "eid73",
                            "left",
                            4523,
                            0,
                            "linear",
                            "${Text3}",
                            '29.27%',
                            '29.27%'
                        ],
                        [
                            "eid72",
                            "opacity",
                            3000,
                            439,
                            "linear",
                            "${Text3}",
                            '0.000000',
                            '0.97841726618705'
                        ],
                        [
                            "eid15",
                            "left",
                            995,
                            0,
                            "linear",
                            "${caja2}",
                            '9.74%',
                            '9.74%'
                        ],
                        [
                            "eid23",
                            "left",
                            1264,
                            385,
                            "linear",
                            "${caja2}",
                            '9.82%',
                            '50.36%'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("free_edgeActions.js");
})("EDGE-328500636");
