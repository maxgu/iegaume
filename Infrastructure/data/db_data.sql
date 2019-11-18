INSERT INTO ie_sections (id, title_lv, title_ru, lessons_count)
VALUES
(99, 'Kopējais', 'Общее', 1),
(1, 'Prieks iepazīties', 'Приятно познакомиться', 6),
(2, 'No visas pasaules', 'Со всего мира', 6),
(3, 'Pilsēta un laukos', 'Город и за городом', 5),
(4, 'Mana māja un ģimene', 'Мой дом и семья', 6);

INSERT INTO ie_lessons (id, section_id, index_letter, title_lv, title_ru, words_count)
VALUES
(1, 99, 'a', 'Kopējais', 'Общее', 10),
(2, 1, 'a', 'Iepazīšanas', 'Знакомство', 16);

INSERT INTO ie_words (section_id, lesson_id, word, translation)
VALUES
(99, 1, 'valoda', 'язык'),
(99, 1, 'mācību', 'обучение'),
(99, 1, 'saziņa', 'связь, общение'),
(99, 1, 'lasi', 'читай'),
(99, 1, 'klausies', 'слушай'),
(99, 1, 'atkārtot', 'повторяй'),
(99, 1, 'raksti', 'пиши'),
(99, 1, 'savieno', 'соедени'),
(99, 1, 'ieraksti', 'запиши'),
(99, 1, 'sarunājies', 'общайся'),
(99, 1, 'runa', 'речь, разговор'),
(99, 1, 'vienskaitlis', 'единственное число'),
(99, 1, 'daudzskaitlis', 'множественное число'),
(99, 1, 'viriešu dzimte', 'мужской род'),
(99, 1, 'sieviešu dzimte', 'женский род'),
(99, 1, 'kas', 'кто'),
(99, 1, 'kо', 'кому'),
(99, 1, 'atbildi', 'ответь'),
(99, 1, 'stāsti', 'рассказ'),
(99, 1, 'atzīmē', 'отметить'),
(99, 1, 'atjauno', 'восстанови');