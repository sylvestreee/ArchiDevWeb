/*add 4 games*/
INSERT INTO games (title, editor, developer, platform, catchphrase, synopsis, illustration, released, rating, price)
       VALUES   (
                    'Marvel''s Spider-Man',
                    'Sony',
                    'Insomniac Games',
                    'PlayStation 4',
                    'Incarne l''homme-araignée et protège New-York des vilains qui l''a menace !',
                    'New-York a besoin de son plus grand héros : Spider-Man ! Alors qu''une menace sans précédent s''apprête à frapper sa ville, tiraillé entre sa vie personnelle et son devoir de super-héros, l''homme-araigné va devoir devenir plus fort, sous peine d''en payer les terribles conséquences...',
                    'sm',
                    '2018-09-07',
                    '5',
                    '54.99'
                ),
                
                (
                    'Shadow of the Tomb Raider',
                    'Square Enix',
                    'Eidos Montréal',
                    'PlayStation 4',
                    'Lara doit empêcher l''apocalypse de s''abattre sur Terre et devenir la Tomb Raider !',
                    'Essayant d''empêcher l''apocalypse de s''abattre sur Terre et de stopper définitivement les agissements dangereux de l''ordre de la Trinité, Lara doit embraser sa destinée et devenir la Tomb Raider !',
                    'tr',
                    '2018-09-14',
                    '4',
                    '56.99'
                ),
                
                (
                    'Pro Evolution Soccer 2019',
                    'Konami',
                    'Konami',
                    'PlayStation 4',
                    'La référence du ballon rond vidéoludique est de retour pour une nouvelle édition !',
                    'Prêt à remettre les crampons ? Pro Evolution Soccer revient avec une nouvelle cuvée, pour toujours plus faire vibrer les amateurs de ballon rond virtuel ! Toujours plus loin dans le réalisme et le plaisir de jeu, ce nouvel opus saura satisfaire les fans de la première heure !',
                    'pes',
                    '2018-08-30',
                    '3',
                    '49.99'
                ),
                
                (
                    'Dragon Question XI : Les Combattants de la destinée',
                    'Square Enix',
                    'Square Enix',
                    'PlayStation 4',
                    'Partez à l''aventure avec vos fidèles compagnons et repousser les ténèbres qui menacent votre monde !',
                    'Orphelin aux origines inconnues, celles-ci vous sont finalement révélées et vous poussent à l''aventure afin de sauver le monde des ténèbres ! Rencontrez des personnages attachants, visitez des lieux splendides, etc... bref ! Vivez une aventure avec un grand A !',
                    'dq',
                    '2018-09-04',
                    '4',
                    '52.99'
                );

/*add 2 users*/
INSERT INTO users (civility, pseudo, name, fname, birthday, email, password)
       VALUES   (
                    'M',
                    'sylvestreee',
                    'Heitz',
                    'Martin',
                    '1997-01-01',
                    'martin-heitz@orange.fr',
                    'Martin6'
                ),
                
                (
                    NULL,
                    'toto',
                    NULL,
                    NULL,
                    NULL,
                    'toto@emaildu68.com',
                    'Tototo8'
                );
                        
/*add 5 genres*/
INSERT INTO genres (name)
       VALUES   ('Action'),
                ('Open World'),
                ('Aventure'),
                ('Sport'),
                ('Simulation');

/*link games with genres*/
INSERT INTO genres_games (genre_id, game_id)
       VALUES   (1, 1),
                (2, 1),
                (1, 2),
                (3, 2),
                (4, 3),
                (5, 3),
                (3, 4),
                (2, 4);

/*fill users cart*/
INSERT INTO carts (game_id, user_id, quantity)
       VALUES   (1, 1, 1),
                (2, 1, 2),
                (3, 2, 1),
                (4, 2, 1);
                            
/*link purchases with games*/
INSERT INTO purchases (user_id, game_id) 
       VALUES   (1, 4),
                (2, 1),
                (2, 2);
