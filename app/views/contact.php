<?php namespace app\views; ?>
<h1>Contact Us</h1>
<form method="post">
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="email" name="subject" class="form-control" " aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="password" name="email" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea name="body" class="form-control" ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>