            <div class="row">
                <div class="col-md-12">
                    <p style="text-align: center;"><small>&copy; EenmaalAndermaal</small></p>
                </div>
            </div>
        </div>

        <script>
            function doCountdown() {
                $('.countdown').each(function() {
                    var timestamp = countdown = $(this).data('countdown') - 1,
                        h = Math.floor(timestamp / 3600),
                        timestamp = timestamp % 3600,
                        m = Math.floor(timestamp / 60),
                        timestamp = timestamp % 60,
                        s = timestamp;

                    if (countdown < 0) {
                        h = 0;
                        m = 0;
                        s = 0;
                    }

                    $(this).data('countdown', countdown).text(h + ':' + m + ':' + s);
                });
            }

            if ($('.countdown')) {
                doCountdown();
                setInterval(doCountdown, 1000);
            }
        </script>
    </body>
</html>