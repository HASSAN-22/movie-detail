
### Laravel package for get detail of movie from imdb

### install:
<code>composer require hasan-22/movie-detail</code>


<p>Your use package like this</p>

## with Facade
```
$result = \Movie\App\Facade\Movie::url('tt8103070')->title()->year();
output: ['title'=>'legacies','year'=>'2018–2022']
```

## with movie class
```
$movie = new \Movie\App\Movie(); 
$result = $movie->url('tt8103070')->title()->year();
output: ['title'=>'legacies','year'=>'2018–2022']
```

#### Your can use method all() for get all detail of movie 
##### example for `all()` method
`
$result = \Movie\App\Facade\Movie::url('tt8103070')->all();
`


## Movie functions

| function         | Description                                                           |
|------------------|-----------------------------------------------------------------------|
| url              | get movie id for load movie page                                      |
| title            | get movie title                                                       |
| rating           | get movie rating info                                                 |
| type             | Get movie type the movie type is one of these [ 'movie' or 'series']. |
| year             | get movie year                                                        |
| creatorOrdirector | It shows the creator or directors of the film                         |
| award            | It shows movie  awards                                                |
| genre            | It shows movie  genres                                                |
| season           | It shows the number of seasons of the series                          |
| description      | Displays the description of the movie                                 |
| releaseDate      | Shows the release date of the movie                                   |
| country            | List of countries where the film was made                             |
| language            | get movie language                                                    |
| trailer            | get movie trailers with posters                                       |
| poster            | get movie original poster                                             |
| all             | get all movie detail                                                  |

### sample output:
```
$result = \Movie\App\Facade\Movie::url('tt8103070')->all();

Or

$result = \Movie\App\Facade\Movie::url('tt8103070')->title()->rating()->type()
->year()->time()->creatorOrdirector()->star()->award()->season()
->description()->genre()->releaseDate()->country()->language()
->trailer()->poster();

print_r($result);

Output:

{
  "title": "Legacies",
  "type": "series",
  "rating": {
    "contentRating": "TV-14",
    "rating": "7.3",
    "votes": "33K"
  },
  "year": "2018–2022",
  "time": "45 minutes",
  "creator_or_director": [
    "Julie Plec"
  ],
  "stars": [
    "Danielle Rose Russell",
    "Aria Shahghasemi",
    "Quincy Fouse"
  ],
  "awards": [
    "3 nominations"
  ],
  "seasons": "4 seasons",
  "description": "Hope Mikaelson, a tribrid daughter of a Vampire/Werewolf hybrid, makes her way in the world.",
  "genres": [
    "Adventure",
    "Drama",
    "Fantasy"
  ],
  "releaseDate": [
    "October 25, 2018 (United States)"
  ],
  "country": [
    "United States"
  ],
  "language": [
    "English"
  ],
  "trailer": {
    "links": [
      "https://www.imdb.com/video/vi3129328409/?ref_=tt_vi_i_1",
      "https://www.imdb.com/video/vi1546109209/?ref_=tt_vi_i_2",
      "https://www.imdb.com/video/vi2932325145/?ref_=tt_vi_i_3",
      "https://www.imdb.com/video/vi1930870041/?ref_=tt_vi_i_4"
    ],
    "posters": [
      "https://m.media-amazon.com/images/M/MV5BYWRjMjZjNmYtN2MwOS00ZDY5LWExMzEtYTM4YTc5MmUxMjk2XkEyXkFqcGdeQWFuaW5vc2M@._V1_Ratio0.6762_AL_.jpg",
      "https://m.media-amazon.com/images/M/MV5BZGI2MDQzOTUtYzA2Yy00OTg1LWEyMGEtN2I3ZWViNzAyOTBjXkEyXkFqcGdeQWRvb2xpbmhk._V1_Ratio0.6762_AL_.jpg",
      "https://m.media-amazon.com/images/M/MV5BMjcwMzk2NmEtOWMxYy00NWMxLWE3ODctM2QyMmUzMmU5OGE2XkEyXkFqcGdeQXRodW1ibmFpbC1pbml0aWFsaXplcg@@._V1_Ratio0.6762_AL_.jpg",
      "https://m.media-amazon.com/images/M/MV5BZDdiNjZjMjItMmFlOC00NTQxLTkwZDMtMGNhNTZlOWI5Y2FjXkEyXkFqcGdeQXRyYW5zY29kZS13b3JrZmxvdw@@._V1_Ratio0.6762_AL_.jpg"
    ]
  },
  "poster": "https://m.media-amazon.com/images/M/MV5BZmMwNDczMDUtNDU0Mi00MjIyLWI1NTktNzM4Yzc1MTNmZDIxXkEyXkFqcGdeQXVyOTQ0NTEzMzk@._V1_Ratio0.6762_AL_.jpg"
}
```
