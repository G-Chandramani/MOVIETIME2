                    <form action="add_movie.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Title:</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="genre">Genre:</label>
                                    <select class="form-control" name="genre" id="genre" required>
                                        <option value="">Select Genre</option>
                                        <option value="Action">Action,Adventure</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="Comedy">Comedy, Drama</option>
                                        <option value="Drama">Drama</option>
                                        <option value="Drama">Action, Sci-Fi, Thriller</option>
                                        <!-- Add more genre options as needed -->
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="duration">Duration:</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select class="form-control" name="hours" id="hours" required>
                                                <option value="">Hours</option>
                                                <?php
                                                for ($i = 0; $i <= 12; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="minutes" id="minutes" required>
                                                <option value="">Minutes</option>
                                                <?php
                                                for ($i = 0; $i <= 59; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Rating:</label>
                                    <input type="text" class="form-control" name="rating" required>
                                </div>
                                <div class="form-group">
                                    <label>Release Date:</label>
                                    <input type="date" class="form-control" name="release_date" required>
                                </div>
                                <div class="form-group">
                                    <label>Movie Description:</label>
                                    <textarea class="form-control" name="movie_desc" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Trailer:</label>
                                    <input type="text" class="form-control" name="trailer" required>
                                </div>
                                <div class="form-group">
                                    <label>Image:</label>
                                    <input type="file" name="image" accept="image/*" required>
                                </div>
                                <div class="form-group">
                                    <label>Total Seats:</label>
                                    <input type="text" class="form-control" name="seats" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Add Movie</button>
                            </form>