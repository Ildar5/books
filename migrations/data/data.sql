INSERT INTO books_land.books (id, title, publish_year, isbn, pages) VALUES (3, 'The Lord off The rings', 1950, '111-ttt-222', 500);
INSERT INTO books_land.books (id, title, publish_year, isbn, pages) VALUES (4, 'Harry Potter', 1990, '33-22-ttt', 600);

INSERT INTO books_land.authors (id, first_name, last_name, name, search) VALUES (1, 'Ronald', 'Tolkien', 'John', 'John Ronald Tolkien');
INSERT INTO books_land.authors (id, first_name, last_name, name, search) VALUES (2, 'Kathleen', 'Rowling', 'Joanne', 'Joanne Kathleen Rowling');

INSERT INTO books_land.book_authors (id, author_id, book_id) VALUES (2, 1, 3);
INSERT INTO books_land.book_authors (id, author_id, book_id) VALUES (3, 2, 4);