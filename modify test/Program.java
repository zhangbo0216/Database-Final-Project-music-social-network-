package edu.nyu.cs9053.homework2;

import java.math.BigDecimal;

/**
 * User: blangel
 * Date: 8/17/14
 * Time: 10:21 AM
 */
public class Program {

    public static void main(String[] args) {
        if (args == null || args.length <= 1) {
            System.out.println("Invalid argument");
            System.exit(0);
        }
        if (args[0].equals("gps")) {
            System.out.println(handleGps(args));
        } else if (args[0].equals("annuity")) {
            if (handleAnnuity(args).equals(new BigDecimal(-1))) {
                System.out.println("Invalid argument");
            } else {
                System.out.println(handleAnnuity(args));
            }
        } else {
            System.out.println("Invalid argument");
        }
    }

    private static String handleGps(String[] args) {
        Gps[] gpsPoints = new Gps[args.length - 1];
        for (int i = 1; i < args.length; i++) {
            if (coordinateIsValid(args[i])) {
                gpsPoints[i - 1] = new Gps(gpsStringToDouble(args[i])[0], gpsStringToDouble(args[i])[1]);
            } else {
                return "Invalid argument";
            }
        }
        return new PolylineEncoder().encodePolyline(gpsPoints);
    }

    private static Double[] gpsStringToDouble(String argument) {
        Double[] coordinates = new Double[2];
        String[] coordinatesString = argument.split(",");
        coordinates[0] = Double.parseDouble(coordinatesString[0]);
        coordinates[1] = Double.parseDouble(coordinatesString[1]);
        return coordinates;
    }

     private static boolean coordinateIsValid(String argument) {
        if (!argument.contains(",")) {
            return false;
        }
        String[] coordinatesString = argument.split(",");
        if (coordinatesString.length != 2) {
            return  false;
        }
        for (int i = 0; i < coordinatesString.length; i++) {
            try {
                Double.parseDouble(coordinatesString[i]);
            } catch (NumberFormatException notDouble) {
                return false;
            }
            Double coordinate = Double.parseDouble(coordinatesString[i]);
            if (i == 0 && (coordinate < -90d || coordinate > 90d)) {
                return false;
            }
            if (i == 1 && (coordinate < -180d || coordinate > 180d)) {
                return  false;
            }
        }
        return  true;
    }

    private static BigDecimal handleAnnuity(String[] args) {
        if (annuityInputIsValid(args)) {
            if (!args[1].equals("compound")) {
                if (args[args.length - 1].equals( "15")) {
                    return new AnnuityCalculator().computeFutureValueOfAnnuityIn15Years(Double.parseDouble(args[args.length - 3]),
                                                                                         Double.parseDouble(args[args.length - 2]));
                }
                if (args[args.length - 1].equals( "30")) {
                    return new AnnuityCalculator().computeFutureValueOfAnnuityIn30Years(Double.parseDouble(args[args.length - 3]),
                                                                                         Double.parseDouble(args[args.length - 2]));
                }
                return new AnnuityCalculator().computeFutureValueOfAnnuity(Double.parseDouble(args[args.length - 3]),
                                                                            Double.parseDouble(args[args.length - 2]),
                                                                            Integer.parseInt(args[args.length - 1]));
            } else {
                if (args[args.length - 1].equals( "15")) {
                    return new AnnuityCalculator().computeMonthlyCompoundedFutureValueOfAnnuityIn15Years(Double.parseDouble(args[args.length - 3]),
                                                                                                            Double.parseDouble(args[args.length - 2]));
                }
                if (args[args.length - 1].equals( "30")) {
                    return new AnnuityCalculator().computeMonthlyCompoundedFutureValueOfAnnuityIn30Years(Double.parseDouble(args[args.length - 3]),
                                                                                                            Double.parseDouble(args[args.length - 2]));
                }
                return new AnnuityCalculator().computeMonthlyCompoundedFutureValueOfAnnuity(Double.parseDouble(args[args.length - 3]),
                                                                                                Double.parseDouble(args[args.length - 2]),
                                                                                                Integer.parseInt(args[args.length - 1]));
            }
        } else {
            return  new BigDecimal(-1);
        }
    }

    private static boolean annuityInputIsValid(String[] args) {
        if (args.length != 5 && args.length != 4) {
            return false;
        }
        if(args.length == 4) {
            if (!annuityDoubleIsValid(args[args.length - 3]) || !annuityDoubleIsValid(args[args.length - 2]) || !annuityIntegerIsValid(args[args.length - 1])) {
                return  false;
            }
        }
        if (args.length == 5) {
            if (!args[1].equals( "compound")) {
                return  false;
            }
            if (!annuityDoubleIsValid(args[args.length - 3]) || !annuityDoubleIsValid(args[args.length - 2]) || !annuityIntegerIsValid(args[args.length - 1])) {
                return  false;
            }
        }
        return true;
    }

    private static boolean annuityDoubleIsValid(String argument) {
        try {
            Double.parseDouble(argument);
        } catch (NumberFormatException notDouble) {
            return false;
        }
        Double annuityDouble = Double.parseDouble(argument);
        if (annuityDouble <= 0d) {
            return  false;
        }
        return  true;
    }

    private static boolean annuityIntegerIsValid(String argument) {
        try {
            Integer.parseInt(argument);
        } catch (NumberFormatException notInteger) {
            return false;
        }
        int year = Integer.parseInt(argument);;
        if (year < 0) {
            return  false;
        }
        return  true;
    }


}