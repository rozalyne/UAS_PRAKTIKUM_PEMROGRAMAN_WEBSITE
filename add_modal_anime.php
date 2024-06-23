<!-- add_modal_anime.php -->
<form id="addAnimeForm" method="post" action="add.php">
    <div class="form-group">
        <label for="name">Anime Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter the name of the anime" required>
    </div>

    <div class="form-group">
        <label for="episode">Episode</label>
        <input type="number" id="episode" name="episode" class="form-control" placeholder="Enter the number of episodes" required>
    </div>

    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" step="0.01" id="rating" name="rating" class="form-control" placeholder="Enter the rating (0-10)" min="0" max="10" required>
    </div>

    <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
