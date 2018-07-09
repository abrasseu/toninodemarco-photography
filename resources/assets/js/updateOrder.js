document.addEventListener("DOMContentLoaded", function(event) { 
	const inputDiv = document.getElementById('order-inputs');
	const orderableDiv = document.getElementById('orderable');
	const orderBtn = document.getElementById('order-btn');

	const sortable = Sortable.create(orderableDiv);

	function updateOrder() {
		for (var i = 0; i < orderableDiv.children.length; i++) {
			// Get orderable id
			var id = orderableDiv.children[i].dataset['id'];

			// Create and configure input
			var input = document.createElement('input');
			input.type = "hidden";
			input.name = "orderables["+i+"]"
			input.value = id;

			// Append input to div
			inputDiv.appendChild(input);
		}
	}

	// Enable button
	orderBtn.disabled = false;
	orderBtn.addEventListener('click', updateOrder);
});