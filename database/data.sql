/*add 4 games*/
INSERT INTO JV VALUES   (
                            'Marvel''s Spider-Man',
                            'Sony',
                            'Insomniac Games',
                            'PlayStation 4',
                            'Incarne l''homme-araignée et protège New-York des vilains qui l''a menace !',
                            'New-York a besoin de son plus grand héros : Spider-Man ! Alors qu''une menace sans précédent s''apprête à frapper sa ville, tiraillé entre sa vie personnelle et son devoir de super-héros, l''homme-araigné va devoir devenir plus fort, sous peine d''en payer les terribles conséquences...',
                            'sm',
                            '07-SEP-18',
                            '5',
                            '54.99'
                        );
                        
INSERT INTO JV VALUES   (
                            'Shadow of the Tomb Raider',
                            'Square Enix',
                            'Eidos Montréal',
                            'PlayStation 4',
                            'Lara doit empêcher l''apocalypse de s''abattre sur Terre et devenir la Tomb Raider !',
                            'Essayant d''empêcher l''apocalypse de s''abattre sur Terre et de stopper définitivement les agissements dangereux de l''ordre de la Trinité, Lara doit embraser sa destinée et devenir la Tomb Raider !',
                            'tr',
                            '14-SEP-18',
                            '4',
                            '56.99'
                        );
                        
INSERT INTO JV VALUES   (
                            'Pro Evolution Soccer 2019',
                            'Konami',
                            'Konami',
                            'PlayStation 4',
                            'La référence du ballon rond vidéoludique est de retour pour une nouvelle édition !',
                            'Prêt à remettre les crampons ? Pro Evolution Soccer revient avec une nouvelle cuvée, pour toujours plus faire vibrer les amateurs de ballon rond virtuel ! Toujours plus loin dans le réalisme et le plaisir de jeu, ce nouvel opus saura satisfaire les fans de la première heure !',
                            'pes',
                            '30-AUG-18',
                            '3',
                            '49.99'
                        );
            
INSERT INTO JV VALUES   (
                            'Dragon Question XI : Les Combattants de la destinée',
                            'Square Enix',
                            'Square Enix',
                            'PlayStation 4',
                            'Partez à l''aventure avec vos fidèles compagnons et repousser les ténèbres qui menacent votre monde !',
                            'Orphelin aux origines inconnues, celles-ci vous sont finalement révélées et vous poussent à l''aventure afin de sauver le monde des ténèbres ! Rencontrez des personnages attachants, visitez des lieux splendides, etc... bref ! Vivez une aventure avec un grand A !',
                            'dq',
                            '04-SEP-18',
                            '4',
                            '52.99'
                        );

/*add 2 users*/
INSERT INTO USER VALUES (
                            'M',
                            'sylvestreee',
                            'Heitz',
                            'Martin',
                            '01-JAN-97',
                            'martin-heitz@orange.fr',
                            'Martin6'
                        );
                        
INSERT INTO USER VALUES (
                            NULL,
                            'toto',
                            NULL,
                            NULL,
                            NULL,
                            'toto@emaildu68.com',
                            'Tototo8'
                        );
                        
/*add 5 genres*/
INSERT INTO GENRE VALUES    ('Action'),
                            ('Open World'),
                            ('Aventure'),
                            ('Sport'),
                            ('Simulation');

/*link games with genres*/
INSERT INTO JV_GENRE VALUES (1, 1),
                            (2, 1),
                            (1, 2),
                            (3, 2),
                            (4, 3),
                            (5, 3),
                            (3, 4),
                            (2, 4);

/*add cart to each user*/
INSERT INTO CART VALUES (1),
                        (2);
                        
/*fill users cart*/
INSERT INTO JV_CART VALUES  (1, 1),
                            (2, 1),
                            (3, 2),
                            (4, 2);
                
/*add purchases to each user*/
INSERT INTO PURCHASE VALUES (1, '10-SEP-18'),
                            (2, '04-OCT-18'),
                            (2, '06-NOV-18');
                            
/*link purchases with games*/
INSERT INTO JV_PURCHASE VALUES  (4, 1),
                                (2, 2),
                                (1, 3);
