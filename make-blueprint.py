for i in range(6):
    if i == 0:
        continue
    else:
        print "array("
        for j in range(11):
            if j == 0:
                continue
            elif j == 10:
                print "\t\t\t$page->team_" + str(j) + "_game_" + str(i) + "()"
            else:
                print "\t\t\t$page->team_" + str(j) + "_game_" + str(i) + "(), "
        print "),\n"
