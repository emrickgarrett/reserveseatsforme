/**
 * Created by Garrett on 11/15/2014.
 */


//These are gonna contain different rooms/layouts

function getRoomData(search){

    search = search.toLowerCase();
    switch(search){
        case "801d project room":
        case "801e project room":
            return {
                chairs:[
                    {
                        "table_id" : 1,
                        "x" : 100,
                        "y" : 160,
                        "status" : open
                    },
                    {
                        "table_id" : 1,
                        "x" : 200,
                        "y" : 160,
                        "status" : open
                    },
                    {
                        "table_id" : 1,
                        "x" : 280,
                        "y" : 80,
                        "status" : open
                    },
                    {
                        "table_id" : 2,
                        "x" : 480,
                        "y" : 160,
                        "status" : open
                    },
                    {
                        "table_id" : 2,
                        "x" : 580,
                        "y" : 160,
                        "status" : open
                    },
                    {
                        "table_id" : 2,
                        "x" : 400,
                        "y" : 80,
                        "status" : open
                    },
                    {
                        "table_id" : 3,
                        "x" : 500,
                        "y" : 320,
                        "status" : "handicap"
                    },
                    {
                        "table_id" : 3,
                        "x" : 580,
                        "y" : 400,
                        "status" : open
                    },
                    {
                        "table_id" : 4,
                        "x" : 300,
                        "y" : 400,
                        "status" : open
                    },
                    {
                        "table_id" : 4,
                        "x" : 300,
                        "y" : 250,
                        "status" : open
                    },
                    {
                        "table_id" : 7,
                        "x" : 580,
                        "y" : 470,
                        "status" : open
                    },
                    {
                        "table_id" : 6,
                        "x" : 480,
                        "y" : 470,
                        "status" : open
                    },
                    {
                        "table_id" : 5,
                        "x" : 380,
                        "y" : 470,
                        "status" : "handicap"
                    }

                ],
                tables :[
                    {
                        "id": 1,
                        "x": 60,
                        "y": 45,
                        status: "open"
                    },
                    {
                        "id" : 1,
                        "x" : 160,
                        "y" : 45,
                        status : "open"
                    },
                    {
                        "id": 2,
                        "x": 440,
                        "y": 45,
                        status: "taken"
                    },
                    {
                        "id" : 2,
                        "x" : 540,
                        "y" : 45,
                        status : "taken"
                    },
                    {
                        "id" : 3,
                        "x" : 540,
                        "y" : 285,
                        status : "open"
                    },
                    {
                        "id" : 4,
                        "x" : 260,
                        "y" : 285,
                        status : "taken"
                    },
                    {
                        "id": 5,
                        "x": 340,
                        "y": 505,
                        status: "open"
                    },
                    {
                        "id": 6,
                        "x": 440,
                        "y": 505,
                        status: "taken"
                    },
                    {
                        "id" : 7,
                        "x" : 540,
                        "y" : 505,
                        status : "open"
                    }
                ],
                walls:[
                    {
                        "x" :10,
                        "y" :20,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :100,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :180,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :260,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :340,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :420,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :500,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 10,
                        "y" : 560,
                        "rotate" : "yes"
                    },//Left Wall
                    {
                        "x" : 10,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 90,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 170,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 250,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 330,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 410,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 490,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 560,
                        "y" : 0,
                        "rotate" : "no"
                    },//Top Wall
                    {
                        "x" : 640,
                        "y" : 0,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 80,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 160,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 240,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 320,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 400,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 480,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 560,
                        "rotate" : "yes"
                    },//Right Wall
                    {
                        "x" : 590,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 510,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 430,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 350,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 270,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 190,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 10,
                        "y" : 610,
                        "rotate" : "no"
                    }
                ],
                plants:[

                ]
            };

        case "801c project room":
        case "801b project room":
        case "801a project room":
            return {
                chairs :[
                    {
                       "table_id" : 1,
                        "x" : 80,
                        "y" : 80,
                        "status" : open
                    },
                    {
                        "table_id" : 1,
                        "x" : 150,
                        "y" : 80,
                        "status" : open
                    },
                    {
                        "table_id" : 1,
                        "x" : 220,
                        "y" : 80,
                        "status" : open
                    },
                    {
                        "table_id" : 1,
                        "x" : 80,
                        "y" : 250,
                        "status" : open
                    },
                    {
                        "table_id" : 1,
                        "x" : 150,
                        "y" : 250,
                        "status" : open
                    },
                    {
                        "table_id" : 1,
                        "x" : 220,
                        "y" : 250,
                        "status" : open
                    },//Top Left
                    {
                        "table_id" : 2,
                        "x" : 440,
                        "y" : 80,
                        "status" : open
                    },
                    {
                        "table_id" : 2,
                        "x" : 510,
                        "y" : 80,
                        "status" : open
                    },
                    {
                        "table_id" : 2,
                        "x" : 580,
                        "y" : 80,
                        "status" : open
                    },
                    {
                        "table_id" : 2,
                        "x" : 440,
                        "y" : 250,
                        "status" : open
                    },
                    {
                        "table_id" : 2,
                        "x" : 510,
                        "y" : 250,
                        "status" : open
                    },
                    {
                        "table_id" : 2,
                        "x" : 580,
                        "y" : 250,
                        "status" : open
                    },//Top Right
                    {
                        "table_id" : 3,
                        "x" : 80,
                        "y" : 380,
                        "status" : open
                    },
                    {
                        "table_id" : 3,
                        "x" : 150,
                        "y" : 380,
                        "status" : open
                    },
                    {
                        "table_id" : 3,
                        "x" : 220,
                        "y" : 380,
                        "status" : open
                    },
                    {
                        "table_id" : 3,
                        "x" : 80,
                        "y" : 550,
                        "status" : open
                    },
                    {
                        "table_id" : 3,
                        "x" : 150,
                        "y" : 550,
                        "status" : open
                    },
                    {
                        "table_id" : 3,
                        "x" : 220,
                        "y" : 550,
                        "status" : open
                    },//Bottom Left
                    {
                        "table_id" : 4,
                        "x" : 440,
                        "y" : 380,
                        "status" : open
                    },
                    {
                        "table_id" : 4,
                        "x" : 510,
                        "y" : 380,
                        "status" : open
                    },
                    {
                        "table_id" : 4,
                        "x" : 580,
                        "y" : 380,
                        "status" : open
                    },
                    {
                        "table_id" : 4,
                        "x" : 440,
                        "y" : 550,
                        "status" : open
                    },
                    {
                        "table_id" : 4,
                        "x" : 510,
                        "y" : 550,
                        "status" : open
                    },
                    {
                        "table_id" : 4,
                        "x" : 580,
                        "y" : 550,
                        "status" : open
                    }
                ],
                tables :[
                    {
                        "id" : 1,
                        "x" : 60,
                        "y" : 125,
                        status : "open"
                    },
                    {
                        "id" : 1,
                        "x" : 160,
                        "y" : 125,
                        status : "open"
                    },
                    {
                        "id" : 2,
                        "x" : 420,
                        "y" : 125,
                        status : "open"
                    },
                    {
                        "id" : 2,
                        "x" : 520,
                        "y" : 125,
                        status : "open"
                    },
                    {
                        "id" : 3,
                        "x" : 60,
                        "y" : 425,
                        status : "taken"
                    },
                    {
                        "id" : 3,
                        "x" : 160,
                        "y" : 425,
                        status : "taken"
                    },
                    {
                        "id" : 4,
                        "x" : 420,
                        "y" : 425,
                        status : "open"
                    },
                    {
                        "id" : 4,
                        "x" : 520,
                        "y" : 425,
                        status : "open"
                    }
                ],
                walls :[
                    {
                        "x" :10,
                        "y" :20,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :100,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :180,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :260,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :340,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :420,
                        "rotate" : "yes"
                    },
                    {
                        "x" :10,
                        "y" :500,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 10,
                        "y" : 560,
                        "rotate" : "yes"
                    },//Left Wall
                    {
                        "x" : 10,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 170,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 250,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 330,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 410,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 490,
                        "y" : 0,
                        "rotate" : "no"
                    },
                    {
                        "x" : 560,
                        "y" : 0,
                        "rotate" : "no"
                    },//Top Wall
                    {
                        "x" : 640,
                        "y" : 0,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 80,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 160,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 240,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 320,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 400,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 480,
                        "rotate" : "yes"
                    },
                    {
                        "x" : 640,
                        "y" : 560,
                        "rotate" : "yes"
                    },//Right Wall
                    {
                        "x" : 590,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 510,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 430,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 350,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 270,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 190,
                        "y" : 610,
                        "rotate" : "no"
                    },
                    {
                        "x" : 10,
                        "y" : 610,
                        "rotate" : "no"
                    }
                ],
                plants :[

                ]
            };
            break;
        default:
            return {
                chairs : [
                    {
                        "table_id" : 1,
                        "x" : 40,
                        "y" : 40,
                        "status" : "open"
                    },
                    {
                        "table_id" : 1,
                        "x" : 110,
                        "y" : 40,
                        "status" : "open"
                    },
                    {
                        "table_id" : 1,
                        "x" : 180,
                        "y" : 40,
                        "status" : "handicap"
                    },
                    {
                        "table_id" : 1,
                        "x" : 40,
                        "y" : 210,
                        "status" : "open"
                    },
                    {
                        "table_id" : 1,
                        "x" : 110,
                        "y" : 210,
                        "status" : "open"
                    },
                    {
                        "table_id" : 1,
                        "x" : 180,
                        "y" : 210,
                        "status" : "handicap"
                    }, //Table Group 1


                    {
                        "table_id" : 2,
                        "x" : 360,
                        "y" : 40,
                        "status" : "taken"
                    },
                    {
                        "table_id" : 2,
                        "x" : 430,
                        "y" : 40,
                        "status" : "taken"
                    },
                    {
                        "table_id" : 2,
                        "x" : 500,
                        "y" : 40,
                        "status" : "taken"
                    },
                    {
                        "table_id" : 2,
                        "x" : 360,
                        "y" : 210,
                        "status" : "taken"
                    },
                    {
                        "table_id" : 2,
                        "x" : 430,
                        "y" : 210,
                        "status" : "taken"
                    },
                    {
                        "table_id" : 2,
                        "x" : 500,
                        "y" : 210,
                        "status" : "taken"
                    }, //Table Group 2


                    {
                        "table_id" : 3,
                        "x" : 680,
                        "y" : 40,
                        "status" : "taken"
                    },
                    {
                        "table_id" : 3,
                        "x" : 750,
                        "y" : 40,
                        "status" : "taken"
                    },
                    {
                        "table_id" : 3,
                        "x" : 820,
                        "y" : 40,
                        "status" : "taken"
                    },
                    {
                        "table_id" : 3,
                        "x" : 680,
                        "y" : 210,
                        "status" : "taken"
                    },
                    {
                        "table_id" : 3,
                        "x" : 750,
                        "y" : 210,
                        "status" : "taken"
                    },
                    {
                        "table_id" : 3,
                        "x" : 820,
                        "y" : 210,
                        "status" : "taken"
                    }, //Table Group 3


                    {
                        "table_id" : 4,
                        "x" : 660,
                        "y" : 330,
                        "status" : "handicap"
                    },
                    {
                        "table_id" : 4,
                        "x" : 660,
                        "y" : 400,
                        "status" : "open"
                    },
                    {
                        "table_id" : 4,
                        "x" : 660,
                        "y" : 470,
                        "status" : "handicap"
                    },
                    {
                        "table_id" : 4,
                        "x" : 840,
                        "y" : 330,
                        "status" : "handicap"
                    },
                    {
                        "table_id" : 4,
                        "x" : 840,
                        "y" : 400,
                        "status" : "open"
                    },
                    {
                        "table_id" : 4,
                        "x" : 840,
                        "y" : 470,
                        "status" : "handicap"
                    }

                ],

                tables : [
                    {
                        "id" : 1,
                        "x" : 20,
                        "y" : 85,
                        status : "open"
                    },
                    {
                        "id" : 1,
                        "x" : 120,
                        "y" : 85,
                        status : "open"
                    }, //Table Group 1


                    {
                        "id" : 2,
                        "x" : 340,
                        "y" : 85,
                        status : "taken"
                    },
                    {
                        "id" : 2,
                        "x" : 440,
                        "y" : 85,
                        status : "taken"
                    }, //Table Group 2

                    {
                        "id" : 3,
                        "x" : 660,
                        "y" : 85,
                        status : "taken"
                    },
                    {
                        "id" : 3,
                        "x" : 760,
                        "y" : 85,
                        status : "taken"
                    },//Table Group 3

                    {
                        "id" : 4,
                        "x" : 710,
                        "y" : 310,
                        status : "open"
                    },
                    {
                        "id" : 4,
                        "x" : 710,
                        "y" : 410,
                        status : "open"
                    }

                ],

                walls : [
                    {
                        "x": 0,
                        "y": 260,
                        "rotate" : "no"
                    },
                    {
                        "x": 0,
                        "y": 440,
                        "rotate" : "no"
                    },
                    {
                        "x": 80,
                        "y": 260,
                        "rotate" : "no"
                    },
                    {
                        "x": 80,
                        "y": 440,
                        "rotate" : "yes"
                    },
                    {
                        "x": 240,
                        "y": 440,
                        "rotate" : "yes"
                    },
                    {
                        "x": 240,
                        "y": 520,
                        "rotate" : "yes"
                    }
                ],

                plants : [
                    {
                        "x": 40,
                        "y": 330
                    },

                    {
                        "x" : 900,
                        "y" : 545
                    },

                    {
                        "x" : 40,
                        "y" : 545
                    }
                ]

            };
    }

}
