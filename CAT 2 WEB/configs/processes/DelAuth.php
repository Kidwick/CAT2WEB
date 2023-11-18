<?php

require_once('../configs/DbConn.php');

try {
    
    $stmt = $DbConn->prepare('SELECT * FROM authors ORDER BY AuthorFullName ASC');
    $stmt->execute();

    
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    
    echo 'Error fetching authors: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Authors</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .delete-btn {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>View Authors</h2>

    <?php if (isset($authors) && count($authors) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Author ID</th>
                    <th>Author Name</th>
                    <th>Author address</th>
                    <th>Author Age</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($authors as $author): ?>
                    <tr>
                        <td><?php echo $author['AuthorID']; ?></td>
                        <td><?php echo $author['AuthorFullName']; ?></td>
                        <td>
                            <a href="EditAuth.php?author_id=<?php echo $author['AuthorID']; ?>">Edit</a>
                            <button class="delete-btn" onclick="deleteAuthor(<?php echo $author['AuthorID']; ?>)">Delete</button>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <script>
            function deleteAuthor(authorId) {
                var confirmDelete = confirm('Are you sure you want to delete this author?');

                if (confirmDelete) {
                    window.location.href = 'DelAuth.php?author_id=' + authorId;
                }
            }
        </script>

    <?php else: ?>
        <p>No authors found.</p>
    <?php endif; ?>

</body>
</html>
