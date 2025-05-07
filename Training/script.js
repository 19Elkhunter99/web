document.addEventListener('DOMContentLoaded', () => {
    fetch('reviews.json')
        .then(response => response.json())
        .then(reviews => {
            const reviewList = document.getElementById('review-list');
            reviews.forEach(review => {
                const reviewItem = document.createElement('p');
                reviewItem.innerHTML = `<strong>${review.name}</strong>: ${review.review}`;
                reviewList.appendChild(reviewItem);
            });
        });
});
