 setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
        }
    }, 3000); // Dismiss after 3 seconds\

    document
        .getElementById("search-input")
        .addEventListener("input", function () {
            let query = this.value;

            if (query.length >= 3) {
                // Trigger search only when 3 or more characters are entered
                fetch(`{{ route('shop.ajax-search') }}?query=${query}`)
                    .then((response) => response.json())
                    .then((data) => {
                        let resultsContainer =
                            document.getElementById("search-results");
                        resultsContainer.innerHTML = ""; // Clear previous results

                        if (data.length === 0) {
                            resultsContainer.innerHTML =
                                "<p>No products found.</p>";
                        } else {
                            let ul = document.createElement("ul");
                            data.forEach((product) => {
                                let li = document.createElement("li");
                                li.textContent = `${product.name} - $${product.price}`;
                                ul.appendChild(li);
                            });
                            resultsContainer.appendChild(ul);
                        }
                    })
                    .catch((error) => console.error("Error:", error));
            } else {
                document.getElementById("search-results").innerHTML = ""; // Clear results if search input is empty
            }
        });