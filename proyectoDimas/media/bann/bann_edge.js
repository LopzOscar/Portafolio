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
                            id: 'fondo',
                            type: 'image',
                            rect: ['0.1%', '0%', '100%', '100%', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"fondo.jpg",'0px','0px']
                        },
                        {
                            id: 'polo',
                            type: 'image',
                            rect: ['52.1%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"polo.png",'0px','0px']
                        },
                        {
                            id: 'fn_logo',
                            type: 'image',
                            rect: ['-32.2%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"fn%20logo.png",'0px','0px']
                        },
                        {
                            id: 'fn_slogan',
                            type: 'image',
                            rect: ['-0.9%', '62.7%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"fn%20slogan.png",'0px','0px']
                        },
                        {
                            id: 'mujer',
                            type: 'image',
                            rect: ['0%', '0.3%', '100%', '100%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"mujer.png",'0px','0px']
                        },
                        {
                            id: 'hombre',
                            type: 'image',
                            rect: ['0.1%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"hombre.png",'0px','0px']
                        },
                        {
                            id: 'hollister',
                            type: 'image',
                            rect: ['0.1%', '0%', '0%', '0%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"hollister.png",'0px','0px']
                        },
                        {
                            id: 'logo_dim',
                            type: 'image',
                            rect: ['0%', '0.3%', '100%', '100%', 'auto', 'auto'],
                            opacity: '2.3001792470723e-009',
                            fill: ["rgba(0,0,0,0)",im+"logo%20dim.PNG",'0px','0px']
                        },
                        {
                            id: 'abercrombie',
                            type: 'image',
                            rect: ['0.1%', '0%', '0%', '0%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"abercrombie.png",'0px','0px']
                        },
                        {
                            id: 'aeropostal',
                            type: 'image',
                            rect: ['0%', '53.7%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"aeropostal.png",'0px','0px']
                        },
                        {
                            id: 'lacoste',
                            type: 'image',
                            rect: ['0%', '-72.3%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"lacoste.png",'0px','0px']
                        },
                        {
                            id: 'slogan',
                            type: 'image',
                            rect: ['0%', '0.3%', '100%', '100%', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"slogan.png",'0px','0px']
                        },
                        {
                            id: 'direccion2',
                            type: 'image',
                            rect: ['68%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"direccion2.png",'0%','0%']
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
                    duration: 10416,
                    autoPlay: true,
                    data: [
                        [
                            "eid21",
                            "top",
                            5503,
                            357,
                            "linear",
                            "${lacoste}",
                            '-72.33%',
                            '0.33%'
                        ],
                        [
                            "eid45",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${fn_logo}",
                            '1',
                            '0'
                        ],
                        [
                            "eid20",
                            "left",
                            4747,
                            756,
                            "linear",
                            "${polo}",
                            '52.08%',
                            '0%'
                        ],
                        [
                            "eid52",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${abercrombie}",
                            '1',
                            '0'
                        ],
                        [
                            "eid12",
                            "opacity",
                            1640,
                            870,
                            "linear",
                            "${mujer}",
                            '0',
                            '1'
                        ],
                        [
                            "eid47",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${mujer}",
                            '1',
                            '0'
                        ],
                        [
                            "eid18",
                            "height",
                            3500,
                            701,
                            "linear",
                            "${abercrombie}",
                            '0%',
                            '100%'
                        ],
                        [
                            "eid26",
                            "left",
                            7000,
                            1448,
                            "linear",
                            "${direccion2}",
                            '68.02%',
                            '0.1%'
                        ],
                        [
                            "eid53",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${lacoste}",
                            '1',
                            '0'
                        ],
                        [
                            "eid50",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${hollister}",
                            '1',
                            '0'
                        ],
                        [
                            "eid51",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${direccion2}",
                            '1',
                            '0'
                        ],
                        [
                            "eid10",
                            "opacity",
                            2160,
                            876,
                            "linear",
                            "${hombre}",
                            '0',
                            '1'
                        ],
                        [
                            "eid49",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${hombre}",
                            '1',
                            '0'
                        ],
                        [
                            "eid16",
                            "opacity",
                            763,
                            679,
                            "linear",
                            "${logo_dim}",
                            '0.020134231075644493',
                            '1'
                        ],
                        [
                            "eid48",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${logo_dim}",
                            '1',
                            '0'
                        ],
                        [
                            "eid4",
                            "left",
                            0,
                            342,
                            "linear",
                            "${fn_logo}",
                            '-32.19%',
                            '-11.77%'
                        ],
                        [
                            "eid5",
                            "left",
                            342,
                            408,
                            "linear",
                            "${fn_logo}",
                            '-11.77%',
                            '0.1%'
                        ],
                        [
                            "eid17",
                            "width",
                            3500,
                            701,
                            "linear",
                            "${abercrombie}",
                            '0%',
                            '100%'
                        ],
                        [
                            "eid46",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${fn_slogan}",
                            '1',
                            '0'
                        ],
                        [
                            "eid15",
                            "height",
                            3061,
                            687,
                            "linear",
                            "${hollister}",
                            '0%',
                            '100%'
                        ],
                        [
                            "eid6",
                            "top",
                            750,
                            500,
                            "linear",
                            "${fn_slogan}",
                            '62.67%',
                            '20%'
                        ],
                        [
                            "eid8",
                            "top",
                            1250,
                            395,
                            "linear",
                            "${fn_slogan}",
                            '20%',
                            '0%'
                        ],
                        [
                            "eid11",
                            "top",
                            2521,
                            0,
                            "linear",
                            "${fn_slogan}",
                            '0%',
                            '0%'
                        ],
                        [
                            "eid42",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${aeropostal}",
                            '1',
                            '0'
                        ],
                        [
                            "eid14",
                            "width",
                            3061,
                            687,
                            "linear",
                            "${hollister}",
                            '0%',
                            '100%'
                        ],
                        [
                            "eid19",
                            "top",
                            4201,
                            546,
                            "linear",
                            "${aeropostal}",
                            '53.67%',
                            '0%'
                        ],
                        [
                            "eid28",
                            "opacity",
                            5765,
                            1051,
                            "linear",
                            "${slogan}",
                            '0',
                            '1'
                        ],
                        [
                            "eid43",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${slogan}",
                            '1',
                            '0'
                        ],
                        [
                            "eid44",
                            "opacity",
                            9264,
                            1152,
                            "linear",
                            "${polo}",
                            '1',
                            '0'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("bann_edgeActions.js");
})("EDGE-470551406");
