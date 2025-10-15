CREATE TABLE threads(
    id INT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    picture TEXT NOT NULL,
    subj TEXT,
    pname varchar(20)
);

CREATE TABLE post(
    id INT PRIMARY KEY,
    subj TEXT NOT NULL,
    picture TEXT,
    pname VARCHAR(20),
    thread INT,
    CONSTRAINT threadpost FOREIGN KEY (thread) REFERENCES threads(id)
);
