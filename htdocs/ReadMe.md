- movies.php : MOVIES table 출력
- movie_directors.php : MOVIE_DIRECTORS table 출력
- movie_genres.php : MOVIE_GENRES table 출력
- actors.php : ACTORS table 출력
- directors.php : DIRECTORS table 출력
- directors_genres.php : DIRECTORS_GENRES table 출력
- reviews.php : REVIEWS table 출력
- roles.php : ROLES table 출력

-index.php : IMDB Database 내 모든 table을 출력.
-movie_description.php : 영화제목이 있는 모든 페이지에서 원하는 영화제목 클릭시
		      그 영화의 상세페이지로 이동, 영화의 정보(제목,평점,상영시기,상영시간,줄거리,감독,배우,리뷰)
		      가 출력, 하단에서 review를 이용자가 추가 가능. 이전 페이지에서
		       GET방식으로 movie_id 정보를 받아옴.
-review_update.php : 사용자가 원하는 영화 상세페이지 하단에서 review를 남길 수 있음.
	                mysql REVIEW table에 update.
-delete_data.php : 사용자가 삭제를 원하는 영화 제목 입력시 영화 관련정보도 포함하여
	                 mysql에서 삭제. 만약 삭제할 영화의 감독이 다른영화도 있을 경우 등을 고려,
									 삭제할 영화 관련 table에서 관련 data가 1개만 있을 경우에만 삭제, 2개 이상은 남겨둔다. 
-insert_data.php :  사용자가 무비데이터 입력 시 mysql에 update함.
-search.php : search시 movie,actor,director,genre 중 선택 후 검색.
	    검색 시 대소문자 구분없고, 풀(Full) 제목,이름,장르를 기입하지않아도
	    mysql 쿼리문 LIKE%%를 이용해 검색한 내용를 포함하는 전체목록 출력.
	    movie는 영화제목을 기입 시 검색한 내용에 해당하는 전체 영화목록 출력.
	    actor는 배우이름을 기입 시 검색한 배우가 출연한 전체 영화목록 출력.
	    director는 감독이름 기입 시 검색한 감독이 연출한 전체 영화목록 출력.
	    genre는 장르(Romance,Sci-Fi,Action,etc)검색 시 해당 장르 영화목록 출력.

#상단 바에 크게 movie, actor, director, review 로 나눠 커서를 올릴 시
movie(movies,movie_genres) actor(actor,roles) director(movie_directors,directors_genres,directors) review(reviews)
하위 카테고리가 뜨며 선택을 할 수가 있다.
#상단 바의 Update, Delete 클릭 시 java script를 통해 all_table, update 1.2.3 ,delete 3종류가 존재.
Update선택 시  update 1만 보이고 all_table은 가려진다. 그 후 next 클릭 시 update1은 사라지고 update 2만보이고,
또 next클릭 시 update 3만 보이고, submit 후 all_table로 전환. Delete선택 또한 delete만 보이고 삭제 후 all_table 보임.
