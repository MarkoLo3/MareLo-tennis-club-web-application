document.addEventListener('DOMContentLoaded', function() {
    fetchMembershipOptions();
});

function fetchMembershipOptions() {
    fetch('getMemberships.php')
        .then(response => response.json())
        .then(data => displayMembershipOptions(data))
        .catch(error => console.error('Error fetching membership data:', error));
}

function displayMembershipOptions(memberships) {
    let link='';
    const membershipContainer = document.getElementById('membershipOptions');
    membershipContainer.innerHTML = '';
    
    memberships.forEach(membership => {
        const membershipCard = document.createElement('div');
        membershipCard.className = 'col-md-4 mb-4';

        if(membership.membershipType=='Premium') {
            link = "css/images/premium.jpg";
        }
        else if(membership.membershipType=='Annual') {
            link = "css/images/membership.jpg";
        }
        else if(membership.membershipType == 'Basic') {
            link = "css/images/basic.jpg";
        }
        else {
            link = "css/images/standard.jpg";
        }

        membershipCard.innerHTML = `
        
            <div class="card" id="membershipCards">
            
                <img loading="lazy" src=${link} class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">${membership.membershipType}</h5>
                    <p class="card-text">Price: $${membership.price}</p>
                    <p class="card-text">Duration: ${membership.duration}</p>
                    <a href="register.php" class="btn btn-primary btn btn-dark">Sign Up</a>
                </div>
            </div>
        
        `;

        membershipContainer.appendChild(membershipCard);
    });
}
