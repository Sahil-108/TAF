function showGovtJobs() {
    var govtJobsSlide = document.querySelector('.govt-jobs');
    var privateJobsSlide = document.querySelector('.private-jobs');
    
    govtJobsSlide.classList.add('active');
    privateJobsSlide.classList.remove('active');
  }
  
  function showPrivateJobs() {
    var govtJobsSlide = document.querySelector('.govt-jobs');
    var privateJobsSlide = document.querySelector('.private-jobs');
    
    govtJobsSlide.classList.remove('active');
    privateJobsSlide.classList.add('active');
  }
  
  // Add event listeners to buttons
  document.querySelector('button:first-child').addEventListener('click', showGovtJobs);
  document.querySelector('button:last-child').addEventListener('click', showPrivateJobs);