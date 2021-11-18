В базе данных имеется таблица с товарами goods (id INTEGER, name TEXT), таблица с тегами tags (id INTEGER, name TEXT) и таблица связи товаров и тегов goods_tags (tag_id INTEGER, goods_id INTEGER, UNIQUE(tag_id, goods_id)). Выведите id и названия всех товаров, которые имеют все возможные теги в этой базе.
На выходе: SQL-запрос.

-- Решение:
SELECT id, name FROM goods
WHERE id IN
        (SELECT goods_id FROM goods_tags
        GROUP BY goods_id HAVING COUNT(goods_id) = (
            SELECT COUNT(*) FROM tags
        ));

Выбрать без join-ов и подзапросов все департаменты, в которых есть мужчины, и все они (каждый) поставили высокую оценку (строго выше 5).
create table evaluations
(
    respondent_id uuid primary key, -- ID респондента
    department_id uuid,             -- ID департамента
    gender        boolean,          -- true — мужчина, false — женщина
    value         integer	    -- Оценка
);

-- Решение:
SELECT DISTINCT department_id FROM evaluations WHERE gender=1 AND value>5;