/*add 4 games*/
INSERT INTO Game (title, editor, developer, platform, catchphrase, synopsis, illustration, released, price)
       VALUES   (
                    'Marvel''s Spider-Man',
                    'Sony',
                    'Insomniac Games',
                    'PlayStation 4',
                    'Incarne l''homme-araignee et protege New-York des vilains qui la menacent !',
                    'New-York a besoin de Spider-Man ! Alors qu''une menace sans precedent s''apprete a frapper sa ville, l''homme-araignee va devoir devenir plus fort, sous peine d''en payer les terribles consequences...',
                    'sm',
                    '2018-09-07',
                    '54.99'
                ),
                
                (
                    'Shadow of the Tomb Raider',
                    'Square Enix',
                    'Eidos Montreal',
                    'PlayStation 4',
                    'Lara doit empecher l''apocalypse de s''abattre sur Terre et devenir la Tomb Raider !',
                    'Essayant d''empecher l''apocalypse de s''abattre sur Terre et de stopper definitivement les agissements dangereux de l''ordre de la Trinite, Lara doit embraser sa destinee et devenir la Tomb Raider !',
                    'tr',
                    '2018-09-14',
                    '56.99'
                ),
                
                (
                    'Pro Evolution Soccer 2019',
                    'Konami',
                    'Konami',
                    'PlayStation 4',
                    'La reference du ballon rond videoludique est de retour pour une nouvelle edition !',
                    'Pro Evolution Soccer revient avec une nouvelle cuvee, pour toujours plus faire vibrer les amateurs de ballon rond virtuel ! Toujours plus loin dans le realisme et le plaisir de jeu, ce nouvel opus saura satisfaire les fans de la premiere heure !',
                    'pes',
                    '2018-08-30',
                    '49.99'
                ),
                
                (
                    'Dragon Quest XI : Les Combattants de la destinee',
                    'Square Enix',
                    'Square Enix',
                    'PlayStation 4',
                    'Partez a l''aventure avec vos fideles compagnons et repousser les tenebres qui menacent votre monde !',
                    'Orphelin aux origines inconnues, celles-ci vous sont finalement revelees et vous poussent a l''aventure afin de sauver le monde des tenebres ! Rencontrez des personnages attachants et visitez des lieux splendides : vivez une aventure avec un grand A !',
                    'dq',
                    '2018-09-04',
                    '52.99'
                );

/*add 5 genres*/
INSERT INTO Genre (name)
       VALUES   ('Action'),
                ('Open World'),
                ('Aventure'),
                ('Sport'),
                ('Simulation');

/*link games with genres*/
INSERT INTO Game_Genre (game_id, genre_id)
       VALUES   (1, 1),
                (1, 2),
                (2, 1),
                (2, 3),
                (3, 4),
                (3, 5),
                (4, 3),
                (4, 2);
                            
-- /*link purchases with games*/
-- INSERT INTO Purchases (game_id, user_id, purchased) 
--       VALUES    (4, 1, '2018-09-06'),
--                 (4, 1, '2018-09-07'),
--                 (4, 1, '2018-09-08'),
--                 (2, 1, '2018-09-09'),
--                 (2, 1, '2018-09-10'),
--                 (1, 1, '2018-09-11');
