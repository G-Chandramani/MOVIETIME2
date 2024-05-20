const movieData = [
    {
        title: "Yaathisai",
        genre: "Action, Drama, Period",
        showtimes: "1:00 PM, 3:30 PM, 7:00 PM",
        image: "images/yaathisai.avif",
        link: "../moviepages/yaathisai.html"
    },
    {
        title: "Godzilla x Kong: The New Empire",
        genre: "Action, Sci-Fi, Thriller",
        showtimes: "1:00 PM, 3:30 PM, 7:00 PM",
        image: "images/godzillaxkong.avif",
        link: "../moviepages/godzilla.html"
    },
    {
        title: "Kingdom of the Planet of the Apes",
        genre: "Action",
        showtimes: "1:00 PM, 3:30 PM, 7:00 PM",
        image: "images/planetsofapes.avif",
        link: "../moviepages/planetofapes.html"
    },
    {
        title: "Maidan",
        genre: "Biography, Drama, Sports",
        showtimes: "1:00 PM, 3:30 PM, 7:00 PM",
        image: "images/maidan.avif",
        link: "../moviepages/maidaan.html"
    },
    {
        title: "Boonie Bears: Mumma Ki Khoj",
        genre: "Action",
        showtimes: "1:00 PM, 3:30 PM, 7:00 PM",
        image: "images/mamakikhoj.avif",
        link: "../moviepages/bunny.html"
    },
    {
        title: "Bade Miyan Chote Miyan",
        genre: "Action, Comedy, Thriller",
        showtimes: "1:00 PM, 3:30 PM, 7:00 PM",
        image: "images/bdemiyachotemiya.avif",
        link: "../moviepages/bademiyan.html"
    },
    {
        title: "Tipppsy",
        genre: "Drama, Thiller",
        showtimes: "1:00 PM, 3:30 PM, 7:00 PM",
        image: "images/tippsy.avif",
        link: "../moviepages/tipppsy.html"
    },  
    {
        title: "Madgaon Express",
        genre: "Comedy, Drama",
        showtimes: "1:00 PM, 3:30 PM, 7:00 PM",
        image: "images/madgaoexpress.avif",
        link: "../moviepages/madgaon.html"
    },
    {
        title: "Prathinidhi 2",
        genre: "Drama,Political,Thriller",
        showtimes: "1:00 PM, 3:30 PM, 7:00 PM",
        image: "images/prathinidhi2.avif",
        link: "../moviepages/Prathinidhi2.html"
        
    },
    {
        title: "Tarot",
        genre: "Horror, Thriller",
        showtimes: "1:00 PM, 3:30 PM, 7:00 PM",
        image: "images/tarot.avif",
        link: "../moviepages/Tarot.html"
    }
    
    // Add more movie data here
];

// Function to generate movie cards dynamically
function generateMovieCards() {
    const movieCardsContainer = document.getElementById("movie-cards");
    let movieCardsHTML = "";

    movieData.forEach((movie) => {
        movieCardsHTML += `
            <div class="card" style="width: 12rem; margin:10px;">
                <img class="card-img-top" src="${movie.image}" alt="${movie.title}">
                <div class="card-overlay">
                    <div class="movie-name" style="justify-content:center;text-align:center;">${movie.title}</div>
                    <div class="movie-genre">${movie.genre}</div>
                    <button class="book-ticket-btn" onclick=" window.location.href='${movie.link}'">Book Ticket</button>
                </div>
            </div>
        `;
    });

    movieCardsContainer.innerHTML = movieCardsHTML;
}


// Call the function to generate movie cards
generateMovieCards();
